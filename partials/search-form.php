<form role="search" method="get" action="<?php echo home_url("/"); ?>">
  <input class="w-full mb-8 border-dashed border-t-0 border-r-0 border-l-0 border-b-[1px] focus:ring-0 border-slate-600 dark:border-slate-300 focus:border-slate-600 bg-transparent placeholder-gray-500 dark:placeholder-gray-400 text-black dark:text-white" type="text" value="<?= get_search_query() ?>" name="s" placeholder="Type here and hit enter..." />

  <div class="flex items-center space-x-2">
    <button type="submit" class="grow md:grow-0 py-2.5 px-5 font-medium text-gray-100 bg-slate-800 hover:bg-slate-900 border border-slate-950 duration-200 transition-colors rounded-lg focus:ring-4 focus:ring-gray-100">Search</button>
    <? if ($args['close-btn']) : ?>
      <button data-modal-hide="search-modal" type="button" class="secondary-btn">Close</button>
    <? endif ?>
  </div>
</form>
