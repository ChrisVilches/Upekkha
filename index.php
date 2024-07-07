<div class="px-4">
  <? if ($search = ThemeUtil::get_search_condition()) : ?>
    <div class="mb-10 text-lg">
      <span class="font-bold"><?= $search['taxonomy'] ?>:</span> <?= $search['value'] ?>
    </div>
  <? endif ?>

  <? get_template_part("./partials/post-list") ?>
  <div class="mt-4">
    <? get_template_part("./partials/page-btns") ?>
  </div>
</div>
