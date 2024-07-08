<header class="bg-slate-700 px-4 pb-4">
  <div class="block md:flex flex-col items-center">

    <div class="md:hidden flex space-x-4 justify-end items-center pt-2">
      <button class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-open-search-modal>
        <span class="sr-only">Search</span>
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>

      <button data-collapse-toggle="navbar-menu" type="button" class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" aria-controls="navbar-menu" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <div class="flex space-x-4 items-center">
      <? if (has_custom_logo()) : ?>
        <div class="sm:block md:hidden size-16">
          <? the_custom_logo() ?>
        </div>
      <? endif ?>
      <a class="grow md:mt-10 text-3xl font-bold uppercase text-gray-300 hover:text-gray-100 duration-200 transition-colors" href="<?= home_url() ?>">
        <? bloginfo('name') ?>
      </a>
    </div>

    <? if (has_custom_logo()) : ?>
      <div class="hidden md:block mt-10">
        <? the_custom_logo() ?>
      </div>
    <? endif ?>
  </div>

  <nav class="main-nav">
    <!-- TODO: For mobile, should the menu toggle button be inside the <nav>??? -->
    <div class="md:hidden">
      <div class="hidden mb-10" id="navbar-menu">
        <? wp_nav_menu(array('theme_location' => 'responsive-menu')) ?>
      </div>
    </div>

    <div class="hidden md:flex space-x-4 mt-8 justify-center mb-4">
      <? wp_nav_menu(array('theme_location' => 'main-menu')) ?>

      <button class="p-2 text-gray-300 hover:text-gray-100 duration-200 transition-colors" data-open-search-modal>
        <span class="sr-only">Search</span>
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </div>

    <div>
      <? get_template_part('./partials/icons') ?>
    </div>
  </nav>

  <? get_search_form() ?>
</header>
