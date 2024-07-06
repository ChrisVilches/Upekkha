<header class="container bg-slate-700 py-12">
  <div class="block md:flex flex-col items-center">

    <div class="flex space-x-4 justify-center items-center">
      <? if (has_custom_logo()) : ?>
        <div class="hidden sm:block md:hidden size-16">
          <a href="<?= home_url() ?>">
            <? the_custom_logo() ?>
          </a>
        </div>
      <? endif ?>
      <a class="grow text-3xl font-bold uppercase text-gray-300 hover:text-gray-100 duration-200 transition-colors" href="<?= home_url() ?>">
        <? bloginfo('name') ?>
      </a>

      <button class="md:hidden text-gray-300 hover:text-gray-100 font-bold uppercase duration-200 transition-colors" onclick="openSearchModal()">
        <svg class="size-6" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path>
        </svg>
      </button>

      <button data-collapse-toggle="navbar-menu" type="button" class="md:hidden text-gray-300 hover:text-gray-100 font-bold uppercase duration-200 transition-colors" aria-controls="navbar-menu" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>

    <? if (has_custom_logo()) : ?>
      <div class="hidden md:block mt-10">
        <a href="<?= home_url() ?>">
          <? the_custom_logo() ?>
        </a>
      </div>
    <? endif ?>
  </div>

  <nav class="main-nav">
    <div class="md:hidden">
      <div class="hidden" id="navbar-menu">
        <? wp_nav_menu(array('theme_location' => 'responsive-menu')) ?>
      </div>
    </div>

    <div class="hidden md:flex space-x-4 mt-8 justify-center">
      <? wp_nav_menu(array('theme_location' => 'main-menu')) ?>

      <button class="text-gray-300 hover:text-gray-100 font-bold uppercase duration-200 transition-colors" onclick="openSearchModal()">
        <svg class="size-6" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path>
        </svg>
      </button>
  </nav>

  <? get_search_form() ?>
</header>
