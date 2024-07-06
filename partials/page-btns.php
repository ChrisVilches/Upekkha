<div class="flex flex-row">
  <div class="grow bg-green-300">
    <? if (ThemeUtil::has_prev_page()) : ?>
      <a class="flex" href="<?= get_previous_posts_page_link() ?>">
        <svg class="size-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5"></path>
        </svg>

        Newer posts
      </a>
    <? endif ?>
  </div>
  <div class="grow bg-blue-300 items-end">
    <? if (ThemeUtil::has_next_page()) : ?>
      <a class="flex" href="<?= get_next_posts_page_link() ?>">
        Older posts
        <svg class="size-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"></path>
        </svg>
      </a>
    <? endif ?>
  </div>
</div>
