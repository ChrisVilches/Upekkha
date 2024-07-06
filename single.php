<? if (have_posts()) : while (have_posts()) : the_post() ?>
    <article class="content-container">
      <h1 class="px-10 text-3xl mb-10 font-bold">
        <? the_title() ?>
      </h1>

      <div class="px-10 text-slate-600 mb-10">
        <div class="flex items-center space-x-2">
          <svg class="size-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
          </svg>
          <div>
            <?= get_the_date() ?>
          </div>
        </div>

        <div class="flex items-center space-x-2">
          <svg class="size-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
          </svg>
          <div>
            <?= get_the_author() ?>
          </div>
        </div>
      </div>

      <? # Or use the URL: the_post_thumbnail_url() 
      ?>
      <div class="inline-flex justify-center w-full mb-20">
        <?= the_post_thumbnail("post-thumbnail") ?>
      </div>

      <div class="px-10">
        <? the_content() ?>

        <!-- TODO: Replace all (or most??) SVG icons with Font Awesome stuff -->

        <? foreach (get_tags() as $tag) : ?>
          <a href="<?= get_tag_link($tag) ?>" class="inline-block rounded-md p-2 text-slate-600 hover:text-slate-800">
            <i class="fa fa-hashtag mr-1.5"></i><?= $tag->name ?>
          </a>
        <? endforeach ?>
      </div>

    </article>
  <? endwhile ?>
<? endif ?>
