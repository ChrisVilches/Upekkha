<header class="bg-slate-700 px-4 pb-6">
  <div class="block md:flex flex-col items-center">
    <div class="hidden md:flex justify-end w-full mt-4">
      <? get_template_part('./partials/theme-toggle') ?>
    </div>

    <div class="md:hidden flex space-x-4 justify-end items-center pt-2">
      <button class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-open-search-modal>
        <span class="sr-only">Search</span>
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>

      <button type="button" class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-drawer-show="sidebar-drawer" aria-controls="sidebar-drawer">
        <span class="sr-only">Menu</span>
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <!-- TODO: (mobile) Maybe the icon would look better below the title.
               I haven't tried it yet because my blog has no logo yet. -->
    <div class="flex space-x-4 md:space-x-0 items-center pt-4 md:pt-2">
      <? if (has_custom_logo()) : ?>
        <div class="sm:block md:hidden size-16 flex items-center">
          <? the_custom_logo() ?>
        </div>
      <? endif ?>
      <a class="grow pr-2 font-rajdhani text-xl md:text-3xl font-bold uppercase text-gray-300 hover:text-gray-100 duration-200 transition-colors" href="<?= home_url() ?>">
        <? bloginfo('name') ?>
      </a>
    </div>

    <? if (has_custom_logo()) : ?>
      <div class="hidden md:block mt-4 size-20">
        <? the_custom_logo() ?>
      </div>
    <? endif ?>
  </div>

  <nav>
    <?
    // NOTE: The drawer has an issue where even when it's closed, you can see the scrollbar a bit.
    // This is probably because of the scrollbar styling. The way to fix it was by adding -left-[0.1px]
    // which moves it a tiny bit to the left.
    // (Issue was only seen on Chrome. Firefox renders the scrollbar differently, so there was no problem).

    // TODO: Not yet fixed!!! I just checked the production site, and still shows.
    // Note, now I use a programmatic drawer, so I can sanitize the look when it's closed easily.
    // I think it got fixed with the new JS mechanism
    // I think it got fixed because when the content is hidden, the scrollbar doesn't need to be shown,
    // so it disappears too. It glitches slightly but almost unnoticeably.
    ?>

    <div id="sidebar-drawer" class="text-slate-200 bg-slate-900 pl-10 pr-10 pb-10 scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-slate-300 sidebar-drawer fixed top-0 z-40 h-full overflow-y-auto -translate-x-full lg:w-1/2 max-w-[calc(100%-5rem)]" aria-label="Menu" tabindex="-1">
      <div data-role="sidebar-content">
        <div class="flex mb-4 sticky top-0 bg-slate-900 py-4">
          <div class="grow">
            <? get_template_part('./partials/theme-toggle') ?>
          </div>
          <button type="button" data-drawer-hide="sidebar-drawer" aria-controls="sidebar-drawer" class="text-gray-400 p-2 bg-transparent rounded-lg flex items-center justify-center">
            <i class="fa-solid fa-xmark text-xl"></i>
            <span class="sr-only">Close</span>
          </button>
        </div>

        <div class="prose prose-invert prose-sm md:prose md:prose-invert prose-li:my-0 prose-li:list-none prose-ul:pl-0 prose-a:no-underline max-w-none">
          <div class="md:hidden sidebar-responsive-menu-container">
            <? wp_nav_menu(array('theme_location' => 'responsive-menu')) ?>
          </div>
          <? dynamic_sidebar('sidebar-widget') ?>
        </div>
      </div>
    </div>

    <div class="main-nav hidden md:flex space-x-4 mt-8 justify-center mb-4">
      <? wp_nav_menu(array('theme_location' => 'main-menu')) ?>

      <button class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-open-search-modal>
        <span class="sr-only">Search</span>
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>

      <button type="button" class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-drawer-show="sidebar-drawer" aria-controls="sidebar-drawer">
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
