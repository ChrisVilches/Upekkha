<? if (have_posts()) : while (have_posts()) : the_post() ?>
    <article class="content-container">
      <h1 class="px-10 text-3xl mb-10 font-bold">
        <? the_title() ?>
      </h1>

      <div class="px-10 text-slate-600 mb-10">
        <div class="flex items-center space-x-2">
          <i class="fa-regular fa-clock text-sm"></i>
          <div>
            <?= get_the_date() ?>
          </div>
        </div>

        <div class="flex items-center space-x-2">
          <i class="fa-regular fa-user text-sm"></i>
          <div>
            <?= get_the_author() ?>
          </div>
        </div>
      </div>

      <? # Or use the URL: the_post_thumbnail_url() 
      ?>
      <? if (has_post_thumbnail()) : ?>
        <div class="inline-flex justify-center w-full mb-20">
          <?= the_post_thumbnail("post-thumbnail") ?>
        </div>
      <? endif ?>

      <div class="px-10 pb-20">
        <? the_content() ?>

        <? foreach (get_tags() as $tag) : ?>
          <a href="<?= get_tag_link($tag) ?>" class="inline-block rounded-md p-2 text-slate-600 hover:text-slate-800">
            <i class="fa fa-hashtag mr-1.5"></i><?= $tag->name ?>
          </a>
        <? endforeach ?>
      </div>


      <? global $authordata; ?>
      <? get_template_part('./partials/prev_next_post') ?>
      <div class="px-10 my-10">
        <? get_template_part('./partials/about_author', null, array("author" => $authordata)) ?>
      </div>
      <? get_template_part('./partials/recommended') ?>
    </article>
  <? endwhile ?>
<? endif ?>
