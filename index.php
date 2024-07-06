<!DOCTYPE html>
<html <? language_attributes() ?>>

<head>
  <meta charset="<? bloginfo("charset") ?>">
  <? wp_head() ?>
</head>

<body class="flex flex-col h-screen">
  <? wp_body_open() ?>
  <div>
    <? get_header() ?>

    <?= get_sidebar() ?>
  </div>

  <main class="container flex-grow">
    <? get_template_part("./partials/post-list") ?>
    <? get_template_part("./partials/page-btns") ?>
  </main>

  <footer class="container">
    <? get_footer() ?>
  </footer>
</body>

</html>
