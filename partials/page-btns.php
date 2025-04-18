<div class="flex flex-row space-x-2">
  <div class="grow sm:flex">
    <? if (ThemeUtil::has_prev_page()) : ?>
      <a aria-label="Newer posts" class="p-2 border-black flex justify-center hover:bg-slate-700 bg-slate-800 text-slate-200 hover:text-slate-100 rounded-md transition-colors duration-200" data-tooltip-target="prev-page-tooltip" href="<?= get_previous_posts_page_link() ?>">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
      <div id="prev-page-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
        Newer posts
        <div class="tooltip-arrow" data-popper-arrow></div>
      </div>
    <? endif ?>
  </div>
  <div class="grow sm:flex justify-end">
    <? if (ThemeUtil::has_next_page()) : ?>
      <a aria-label="Older posts" class="p-2 border-black flex justify-center hover:bg-slate-700 bg-slate-800 text-slate-200 hover:text-slate-100 rounded-md transition-colors duration-200" data-tooltip-target="next-page-tooltip" href="<?= get_next_posts_page_link() ?>">
        <i class="fa-solid fa-arrow-right"></i>
      </a>

      <div id="next-page-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
        Older posts
        <div class="tooltip-arrow" data-popper-arrow></div>
      </div>
    <? endif ?>
  </div>
</div>
