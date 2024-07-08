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

  static function get_search_condition()
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
  );

  static function assets()
  {
    $theme_ver = wp_get_theme()->get('Version');

    // TODO: Am I even using these fonts????
    wp_register_style("google-font", "https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700", array(), false, 'all');
    wp_register_style("google-font-2", "https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap", array(), false, 'all');
    wp_enqueue_style("styles", get_template_directory_uri() . "/assets/style.css", array("google-font"), $theme_ver);
    wp_enqueue_style("font-awesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css", array(), "6.5.2", "all");
    wp_enqueue_script("js", get_template_directory_uri() . "/assets/script.js", array(), $theme_ver);
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
}

add_action('customize_register', "CustomTheme::add_customizer");
add_filter('template_include', "CustomTheme::add_before_after_main_tag");
add_action("after_setup_theme", "CustomTheme::add_menus");
add_action("after_setup_theme", "CustomTheme::theme_supports");
add_action("wp_enqueue_scripts", "CustomTheme::assets");
