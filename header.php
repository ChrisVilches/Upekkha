<header class="bg-slate-700 px-4 pb-6">
  <div class="block md:flex flex-col items-center">

    <div class="md:hidden flex space-x-4 justify-end items-center pt-2">
      <button class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-open-search-modal>
        <span class="sr-only">Search</span>
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>

      <button type="button" class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-drawer-target="sidebar-drawer" data-drawer-show="sidebar-drawer" aria-controls="sidebar-drawer">
        <span class="sr-only">Menu</span>
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <!-- TODO: (mobile) Maybe the icon would look better below the title.
               I haven't tried it yet because my blog has no logo yet. -->
    <div class="flex space-x-4 md:space-x-0 items-center pt-4 md:pt-14">
      <? if (has_custom_logo()) : ?>
        <div class="sm:block md:hidden size-16 flex items-center">
          <? the_custom_logo() ?>
        </div>
      <? endif ?>
      <a class="grow text-3xl font-bold uppercase text-gray-300 hover:text-gray-100 duration-200 transition-colors" href="<?= home_url() ?>">
        <? bloginfo('name') ?>
      </a>
    </div>

    <? if (has_custom_logo()) : ?>
      <div class="hidden md:block mt-10">
        <? the_custom_logo() ?>
      </div>
    <? endif ?>
  </div>

  <nav>
    <div id="sidebar-drawer" class="scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-slate-300 sidebar-drawer fixed top-0 left-0 z-40 h-full p-4 overflow-y-auto transition-transform -translate-x-full md:w-3/4 max-w-[calc(100%-5rem)]" tabindex="-1" aria-labelledby="drawer-label">
      <div class="md:hidden sidebar-responsive-menu-container">
        <? wp_nav_menu(array('theme_location' => 'responsive-menu')) ?>
      </div>
      <? dynamic_sidebar('sidebar-widget') ?>
      <button type="button" data-drawer-hide="sidebar-drawer" aria-controls="sidebar-drawer" class="text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close</span>
      </button>
    </div>

    <div class="main-nav hidden md:flex space-x-4 mt-8 justify-center mb-4">
      <? wp_nav_menu(array('theme_location' => 'main-menu')) ?>

      <button class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-open-search-modal>
        <span class="sr-only">Search</span>
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>

      <!-- TODO: Not sure about putting the drawer toggle button here... -->
      <button type="button" class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-drawer-target="sidebar-drawer" data-drawer-show="sidebar-drawer" aria-controls="sidebar-drawer">
        <span class="sr-only">Menu</span>
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <div>
      <? get_template_part('./partials/icons') ?>
    </div>
  </nav>

  <? get_search_form() ?>
</header>
