<div class="grid grid-cols-4 gap-2">
  <? if (have_posts()) : ?>
    <? while (have_posts()) : the_post() ?>
      <a href="<? the_permalink() ?>" class="border-[1px] border-black hover:bg-red-200 duration-200 transition-colors p-4">
        <div class="text-sm text-gray-300">
          <?= get_the_date() ?>
        </div>
        <p class="font-bold">
          <? the_title() ?>
        </p>
        <? if (has_post_thumbnail()) : ?>
          <div class="w-full max-h-40">
            <img class="object-cover max-h-40 w-full" src="<?= the_post_thumbnail_url() ?>">
          </div>
        <? endif ?>
      </a>
    <? endwhile ?>
  <? endif ?>
</div>
