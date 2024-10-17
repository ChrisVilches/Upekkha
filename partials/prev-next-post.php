<div class="bg-slate-200 dark:bg-slate-700">
  <?
  $prev = get_previous_post();
  $next = get_next_post()
  ?>

  <div class="grid grid-cols-1 md:grid-cols-2">
    <? if (empty($prev)) : ?>
      <div class="p-8 hidden md:block">
      </div>
    <? else : ?>
      <a class="p-8 text-black dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-800 duration-200 transition-colors" rel="prev" href="<?= get_permalink(
          $prev
      ) ?>">
        <div class="flex">
          <div class="font-bold">
            <i class="fa fa-chevron-left"></i>
          </div>

          <div class="ml-4">
            <div class="font-bold mb-8">Previous post</div>
            <p><?= $prev->post_title ?></p>
          </div>
        </div>
      </a>
    <? endif ?>

    <? if (empty($next)) : ?>
      <div class="text-end p-8 hidden md:block">
      </div>
    <? else : ?>
      <a class="text-end p-8 text-black dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-800 duration-200 transition-colors" rel="next" href="<?= get_permalink(
          $next
      ) ?>">
        <div class="flex">
          <div class="mr-4 grow">
            <div class="font-bold mb-8">Next post</div>
            <p><?= $next->post_title ?></p>
          </div>
          <div class="font-bold">
            <i class="fa fa-chevron-right"></i>
          </div>
        </div>
      </a>
    <? endif ?>
  </div>
</div>
