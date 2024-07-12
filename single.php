<? if (have_posts()) : while (have_posts()) : the_post() ?>
    <article class="prose md:prose-lg dark:prose-invert max-w-none prose-a:no-underline">
      <h1 class="px-4 md:px-10 mb-10 text-center">
        <? the_title() ?>
      </h1>

      <div class="px-4 md:px-10 text-gray-500 dark:text-gray-400 mb-10">
        <div class="flex items-center space-x-2 justify-center">
          <i class="fa-regular fa-clock"></i>
          <div>
            <?= get_the_date() ?>
          </div>
        </div>

        <div class="flex items-center space-x-2 justify-center">
          <i class="fa-regular fa-user"></i>
          <div>
            <?= get_the_author() ?>
          </div>
        </div>
      </div>

      <? if (has_post_thumbnail()) : ?>
        <div class="inline-flex justify-center w-full mb-0">
          <?= the_post_thumbnail("post-thumbnail") ?>
        </div>
      <? endif ?>

      <div class="px-4 md:px-10 pb-20">
        <div class="content-container">
          <? the_content() ?>
        </div>
        <? get_template_part('./partials/post-tags') ?>
      </div>
    </article>
    <? global $authordata; ?>
    <? get_template_part('./partials/prev-next-post') ?>
    <div class="px-4 md:px-10 my-10">
      <? get_template_part('./partials/about-author', null, array("author" => $authordata)) ?>
    </div>
    <? get_template_part('./partials/recommended') ?>
  <? endwhile ?>
<? endif ?>
