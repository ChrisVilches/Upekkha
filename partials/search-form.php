<form role="search" method="get" action="<?php echo home_url('/'); ?>">
  <input class="w-full mb-8 border-dashed border-t-0 border-r-0 border-l-0 border-b-[1px] focus:ring-0 border-slate-600 focus:border-slate-600" type="text" value="<?= get_search_query() ?>" name="s" placeholder="Type here and hit enter..." />

  <div class="flex items-center space-x-2">
    <button type="submit" class="grow md:grow-0 py-2.5 px-5 text-sm font-medium text-gray-100 focus:outline-none bg-slate-800 hover:bg-slate-900 duration-200 transition-colors rounded-lg border border-gray-200 focus:ring-4 focus:ring-gray-100">Search</button>
    <? if ($args['close-btn']) : ?>
      <button data-modal-hide="search-modal" type="button" class="grow md:grow-0 py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100">Close</button>
    <? endif ?>
  </div>
</form>
