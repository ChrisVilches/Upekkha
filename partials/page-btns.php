<div class="flex flex-row space-x-2">
  <div class="grow sm:flex">
    <? if (ThemeUtil::has_prev_page()) : ?>
      <a class="p-2 border-black flex justify-center hover:bg-slate-700 bg-slate-800 text-slate-200 hover:text-slate-100 rounded-md transition-colors duration-200" data-tooltip-target="prev-page-tooltip" href="<?= get_previous_posts_page_link() ?>">
        <svg class="size-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"></path>
        </svg>
      </a>
      <div id="prev-page-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
        Newer posts
        <div class="tooltip-arrow" data-popper-arrow></div>
      </div>
    <? endif ?>
  </div>
  <div class="grow sm:flex justify-end">
    <? if (ThemeUtil::has_next_page()) : ?>
      <a class="p-2 border-black flex justify-center hover:bg-slate-700 bg-slate-800 text-slate-200 hover:text-slate-100 rounded-md transition-colors duration-200" data-tooltip-target="next-page-tooltip" href="<?= get_next_posts_page_link() ?>">
        <svg class="size-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
        </svg>
      </a>

      <div id="next-page-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
        Older posts
        <div class="tooltip-arrow" data-popper-arrow></div>
      </div>
    <? endif ?>
  </div>
</div>
