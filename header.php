<nav>
  <ul>
    <li></li>
  </ul>
  <? wp_nav_menu(array("menu" => "main-menu")) ?>

  <a href="<?= home_url() ?>">
    <? the_custom_logo() ?>
  </a>
</nav>
