<?

// TODO: This should be a standalone plugin (i.e. not related to this theme in particular).

class Capitalization
{
  private static function content_is_gutenberg($str)
  {
    // Heuristic
    return str_contains($str, "<!-- wp:");
  }

  // TODO: Note this title "Lay It All on Me, I Could Going On Singing".
  //       The breaker (the "on" is capitalized depending on grammatical function).
  //       This basically means this plugin is a "dumb" capitalizer.

  private static function char_is_uppercase($c)
  {
    return strtoupper($c) == $c;
  }

  // Heuristic: Detect mixed case joined words like WordPress or GitHub.
  private static function words_joined($str)
  {
    if (!self::char_is_uppercase($str[0])) return false;
    if (self::char_is_uppercase(substr($str, -1))) return false;

    for ($i = 1; $i < strlen($str) - 1; $i++) {
      if (!self::char_is_uppercase($str[$i])) continue;

      if (self::char_is_uppercase($str[$i - 1]) || self::char_is_uppercase($str[$i + 1])) {
        return false;
      }
    }

    return true;
  }

  private static function avoid_capitalize($word)
  {
    $minor_words = ['of', 'a', 'an', 'in', 'the', 'as', 'and', 'or', 'of', 'with', 'by', 'for', 'to'];

    if (strtoupper($word) == $word) return true;

    if (in_array($word, $minor_words)) return true;

    if (self::words_joined($word)) return true;

    return !preg_match("/^[a-zA-Z\']+$/", $word);
  }

  private static function pretty_capitalize($str)
  {
    $result = preg_replace_callback('/([a-zA-Z_\-\']+)/', function ($s) {
      $word = $s[0];
      return self::avoid_capitalize($word) ? $word : ucfirst(strtolower($word));
    }, $str);

    return ucfirst(preg_replace_callback('/[\.\!\?\:]\\s+([a-zA-Z])/', function ($s) {
      return strtoupper($s[0]);
    }, trim($result)));

    return ucfirst(trim($result));
  }

  private static function sanitize_markdown($content)
  {
    $result = [];
    foreach (preg_split("/((\r?\n)|(\r\n?))/", $content) as $line) {
      $result[] = preg_replace_callback("/^(\\s*#{1,8}\\s*)(.+?)$/s", fn ($s) => $s[1] . self::pretty_capitalize($s[2]), $line);
    }
    return implode("\n", $result);
  }

  private static function improve_regex($reg)
  {
    $reg = str_replace(' ', "\\s*", $reg);
    return $reg;
  }

  private static function sanitize_h_tag($tag)
  {
    return preg_replace_callback(self::improve_regex('/<h(\\d)(\\s+[^>]*)?>(.*?)<\/h(\\d)>/s'), function ($s) {
      $tag_name = "h" . $s[1];
      return "<{$tag_name}{$s[2]}>" . self::pretty_capitalize($s[3]) . "</{$tag_name}>";
    }, $tag);
  }

  private static function sanitize_gutenberg($content)
  {
    $pattern_no_level = self::improve_regex('/<!-- wp:heading(.*?)-->(.*?)<!-- \/wp:heading -->/s');

    return preg_replace_callback($pattern_no_level, function ($s) {
      // Add at least a space. Mostly for checking unit tests.
      if (empty($s[1])) $s[1] = " ";
      return "<!-- wp:heading" . $s[1] . "-->" . self::sanitize_h_tag($s[2]) . "<!-- /wp:heading -->";
    }, $content);
  }

  public static function sanitize_title($title)
  {
    return self::pretty_capitalize($title);
  }

  public static function sanitize_content($content)
  {
    if (self::content_is_gutenberg($content)) {
      return self::sanitize_gutenberg($content);
    } else {
      return self::sanitize_markdown($content);
    }
  }
}

class CapitalizationConfig
{
  private static function sidebar_html()
  {
    // TODO: What is this. Remove??
    wp_nonce_field('custom_sidebar_checkbox_nonce', 'custom_sidebar_checkbox_nonce');

    // Not the most modern way to add custom configuration blocks, but the modern
    // way involves compiling my own React code, it seems.
?>
    <div>
      <span>
        <input id="capitalization-sidebar-checkbox" name="capitalization-sidebar-checkbox" type="checkbox" value="1" checked>
      </span>
      <label for="capitalization-sidebar-checkbox">
        Capitalize headers and title
      </label>
    </div>
<?
  }
  public static function add_config()
  {
    add_meta_box(
      'capitalization_sidebar_checkbox',
      'Capitalization (on save)',
      fn () => self::sidebar_html(),
      'post',
      'side',
      'high'
    );
  }
}

if (isset($_POST['capitalization-sidebar-checkbox']) && $_POST['capitalization-sidebar-checkbox'] == '1') {
  add_filter('title_save_pre', 'Capitalization::sanitize_title', 10, 1);
  add_filter('content_save_pre', 'Capitalization::sanitize_content', 10, 1);
}

add_action('add_meta_boxes', 'CapitalizationConfig::add_config');

function test()
{

  $files = scandir(get_template_directory() . '/capitalization/test-cases/', SCANDIR_SORT_ASCENDING);

  foreach ($files as $file) {
    if (str_ends_with($file, ".ans")) continue;
    $num = explode(".", $file)[0];
    if (empty($num)) {
      continue;
    }
    $in = file_get_contents(get_template_directory() . '/capitalization/test-cases/' . $num . '.in', "r");
    $ans = file_get_contents(get_template_directory() . '/capitalization/test-cases/' . $num . '.ans', "r");
    $result = Capitalization::sanitize_content($in);

    assert($result == $ans, "Capitalization test '{$num}' failed. Computed result: {$result}");
  }
}

test();
