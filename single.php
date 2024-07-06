<!-- TODO: "pages" aren't shown using this template -->

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
    <? if (have_posts()) : ?>
      <div class="nav-previous alignleft"><? next_posts_link('Older posts') ?></div>
      <div class="nav-next alignright"><? previous_posts_link('Newer posts') ?></div>

      <? while (have_posts()) : the_post() ?>
        <div style="border: 1px solid black; padding: 5px; margin: 5px;">
          Reading "<? the_title() ?>"
          <? # Or use the URL: the_post_thumbnail_url() 
          ?>
          <?= the_post_thumbnail("post-thumbnail") ?>
          <? the_content() ?>
          <? foreach (get_tags() as $tag) : ?>
            <?= $tag->name ?>
          <? endforeach ?>
        </div>
      <? endwhile ?>
    <? endif ?>
  </main>

  <? get_footer() ?>
  <!-- TODO: Not working. Scripts are added at the top -->
  <? wp_footer() ?>
</body>

</html>
