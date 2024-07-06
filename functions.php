<?

class ThemeUtil
{
  static function has_prev_page()
  {
    global $wp_query;
    return $wp_query->get('paged') > 1;
  }

  static function has_next_page()
  {
    global $wp_query;
    return $wp_query->get('paged') != $wp_query->max_num_pages;
  }
}

class CustomTheme
{
  static function assets()
  {
    wp_register_style("google-font", "https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700", array(), false, 'all');
    wp_register_style("google-font-2", "https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap", array(), false, 'all');
    wp_register_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css", array(), "5.1.0", 'all');
    wp_enqueue_style("styles", get_template_directory_uri() . "/assets/style.css", array("google-font", "bootstrap"));
    wp_enqueue_style("font-awesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css", array(), "6.5.2", "all");
    wp_enqueue_script("js", get_template_directory_uri() . "/assets/script.js");
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
}

// TODO: Add configurations (SNS links, etc).

add_filter('template_include', "CustomTheme::add_before_after_main_tag");
add_action("after_setup_theme", "CustomTheme::add_menus");
add_action("after_setup_theme", "CustomTheme::theme_supports");
add_action("wp_enqueue_scripts", "CustomTheme::assets");
