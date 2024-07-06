<!DOCTYPE html>
<html <? language_attributes() ?>>

<head>
  <meta charset="<? bloginfo("charset") ?>">
  <? wp_head() ?>
</head>

<body>
  <? wp_body_open() ?>
  <? get_header() ?>

  <main>
    <? the_content() ?>
  </main>

  <? get_footer() ?>
  <!-- TODO: Not working. Scripts are added at the top -->
  <? wp_footer() ?>
</body>

</html>
