<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
  <? if (have_posts()) : ?>
    <? while (have_posts()) : the_post() ?>
      <a href="<? the_permalink() ?>" class="border-[1px] border-slate-300 hover:border-slate-600 text-black hover:bg-slate-200 duration-700 transition-colors p-8">
        <div class="text-sm text-gray-500 mb-4">
          <?= get_the_date() ?>
        </div>
        <p class="font-bold text-2xl">
          <? the_title() ?>
        </p>
        <? if (has_post_thumbnail()) : ?>
          <div class="w-full max-h-40 mt-8">
            <img class="object-cover max-h-40 w-full" src="<?= the_post_thumbnail_url() ?>">
          </div>
        <? endif ?>
      </a>
    <? endwhile ?>
  <? endif ?>
</div>