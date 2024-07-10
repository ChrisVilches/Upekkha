<?

class ThemeUtil
{
  static function has_prev_page()
  {
    $current_page = max(1, get_query_var('paged'));
    return $current_page > 1;
  }

  static function has_next_page()
  {
    global $wp_query;
    $current_page = max(1, get_query_var('paged'));
    return $current_page < $wp_query->max_num_pages;
  }

  static function get_filter_condition()
  {
    $queried_object = get_queried_object();

    if (isset($queried_object->taxonomy)) {
      $taxonomy_name = "Search";
      if ($taxonomy = get_taxonomy($queried_object->taxonomy)) {
        $taxonomy_name = $taxonomy->labels->singular_name;
      }

      return array("taxonomy" => $taxonomy_name, "value" => $queried_object->name);
    }

    return null;
  }

  static function get_archive_date_fmt()
  {
    if (!is_date()) return null;

    $fmt = array(
      1 => "Y",
      2 => "F, Y",
      3 => get_option('date_format')
    );

    $date = new DateTime();

    $y = get_query_var('year');
    $m = get_query_var('monthnum');
    $d = get_query_var('day');
    $n = !empty($y) + !empty($m) + !empty($d);

    // Values need to be at least 1, or else setDate() won't work properly.
    if (!$y) $y = 1;
    if (!$m) $m = 1;
    if (!$d) $d = 1;

    $date->setDate($y, $m, $d);

    return $date->format($fmt[$n]);
  }
}

class CustomTheme
{
  static $social_sites = array(
    "facebook" => array(
      "label" => "Facebook",
      "fa-icon" => "facebook",
      "class" => "hover:text-blue-500"
    ),
    "github" => array(
      "label" => "Github",
      "fa-icon" => "github",
      "class" => "hover:text-white"
    ),
    "x" => array(
      "label" => "X (Twitter)",
      "fa-icon" => "x-twitter",
      "class" => "hover:text-white"
    ),
    "youtube" => array(
      "label" => "YouTube",
      "fa-icon" => "youtube",
      "class" => "hover:text-red-500"
    ),
    "linkedin" => array(
      "label" => "LinkedIn",
      "fa-icon" => "linkedin",
      "class" => "hover:text-blue-600"
    ),
    "line" => array(
      "label" => "Line",
      "fa-icon" => "line",
      "class" => "hover:text-green-500"
    ),
    "instagram" => array(
      "label" => "Instagram",
      "fa-icon" => "instagram",
      "class" => "hover:text-pink-500"
    ),
  );

  static function assets()
  {
    $theme_ver = wp_get_theme()->get('Version');

    wp_enqueue_style("styles", get_template_directory_uri() . "/dist/style.css", array(), $theme_ver);
    wp_enqueue_style("font-awesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css", array(), "6.5.2", "all");
    wp_enqueue_script("main-script", get_template_directory_uri() . "/dist/main.js", array(), $theme_ver);
  }

  static function analytics()
  {
    // TODO: This will be probably unused.
    echo "<h1>Analytics</h1>";
  }

  static function theme_supports()
  {
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("custom-logo", array(
      "width" => 80,
      "height" => 80,
      "flex-width" => true,
      "flex-height" => true
    ));
  }

  static function add_menus()
  {
    register_nav_menus(array(
      "main-menu" => "Main Menu",
      "responsive-menu" => "Responsive Menu"
    ));
  }

  static function add_before_after_main_tag($template)
  {
    get_template_part("./partials/main-tag-before");
    include $template;
    get_template_part("./partials/main-tag-after");

    return false;
  }

  static function get_related_posts()
  {
    global $post;

    $tag_ids = array_map(fn ($t) => $t->term_id, wp_get_post_tags($post->ID));

    $args = array(
      'posts_per_page' => 5,
      'tag__in' => $tag_ids,
      'post__not_in' => array($post->ID),
      'ignore_sticky_posts' => 1,
      'orderby' => 'rand'
    );

    return new WP_Query($args);
  }


  static function add_customizer($wp_customize)
  {
    // Add a custom section
    $wp_customize->add_section('theme-options', array(
      'title'      => 'Theme Options',
      'priority'   => 30,
    ));

    $social_sites = CustomTheme::$social_sites;

    foreach ($social_sites as $site => $data) {
      $wp_customize->add_setting('social-sites-' . $site, array(
        'section' => 'theme-options',
        'default'    => '',
        'transport'  => 'refresh',
      ));
      $wp_customize->add_control('social-sites-' . $site, array(
        'label' => $data['label'],
        'section' => 'theme-options'
      ));
    }
  }

  static function add_custom_sidebar()
  {
    register_sidebar(
      array(
        'id' => 'sidebar-widget',
        'name' => 'Sidebar Widget',
        'description' => 'Customizable widget that gets displayed in the drawer sidebar',
        // TODO: What's all of this?
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
      )
    );
  }
}

add_filter('wp_script_attributes', function ($attributes) {
  if (isset($attributes['id']) && $attributes['id'] === 'main-script-js') {
    $attributes['type'] = 'module';
  }

  return $attributes;
}, 10, 1);

add_action('widgets_init', 'CustomTheme::add_custom_sidebar');
add_action('customize_register', "CustomTheme::add_customizer");
add_filter('template_include', "CustomTheme::add_before_after_main_tag");
add_action("after_setup_theme", "CustomTheme::add_menus");
add_action("after_setup_theme", "CustomTheme::theme_supports");
add_action("wp_enqueue_scripts", "CustomTheme::assets");
