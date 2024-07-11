<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
  <? if (have_posts()) : ?>
    <? while (have_posts()) : the_post() ?>
      <a href="<? the_permalink() ?>" class="flex flex-col border-[1px] border-slate-300 dark:border-slate-900 hover:border-slate-600 hover:bg-slate-200 dark:hover:bg-slate-700 dark:hover:border-slate-950 duration-700 transition-colors p-8">
        <div class="text-sm text-gray-500 mb-4">
          <?= get_the_date() ?>
        </div>
        <h2 class="grow">
          <? the_title() ?>
        </h2>
        <? if (has_post_thumbnail()) : ?>
          <div class="w-full max-h-40 mt-8">
            <? the_post_thumbnail('medium', array("class" => "object-cover max-h-40 w-full")) ?>
          </div>
        <? endif ?>
      </a>
    <? endwhile ?>
  <? endif ?>
</div>
