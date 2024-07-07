<div id="search-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full transition-all duration-400">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="flex items-center justify-between p-4 md:p-5 rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          Search
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="search-modal">
          <i class="fa-solid fa-xmark"></i>
          <span class="sr-only">Close</span>
        </button>
      </div>

      <form role="search" class="py-4 px-4" method="get" action="<?php echo home_url('/'); ?>">
        <input class="w-full mb-8 border-dashed border-t-0 border-r-0 border-l-0 border-b-[1px] focus:ring-0 border-slate-600 focus:border-slate-600" type="text" value="<?= get_search_query() ?>" name="s" placeholder="Type here and hit enter..." />

        <div class="flex items-center space-x-2">
          <button type="submit" class="grow md:grow-0 py-2.5 px-5 text-sm font-medium text-gray-100 focus:outline-none bg-slate-800 hover:bg-slate-900 duration-200 transition-colors rounded-lg border border-gray-200 focus:ring-4 focus:ring-gray-100">Search</button>
          <button data-modal-hide="search-modal" type="button" class="grow md:grow-0 py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
