<?
$search_query = get_search_query();
$filter = ThemeUtil::get_filter_condition();
?>

<div class="px-4 md:px-10">
  <? if ($search_query || $filter) : ?>
    <div class="mb-10 bg-slate-200 border-slate-600 dark:bg-slate-700 dark:border-slate-950 border-[1px] p-4">
      <? if ($search_query) : ?>
        <div class="text-lg leading-9">
          <span class="font-bold">Search results for:</span> <?= $search_query ?>
        </div>
      <? endif ?>

      <? if ($filter) : ?>
        <div class="text-lg leading-9">
          <span class="font-bold"><?= $filter['taxonomy'] ?>:</span> <?= $filter['value'] ?>
        </div>
      <? endif ?>
    </div>

    <? if ($search_query && !have_posts()) : ?>
      <p>
        Nothing found. Please try again with some different keywords.
      </p>

      <div class="mt-10 w-full md:w-1/2">
        <? get_template_part('./partials/search-form', null, array("close-btn" => false)) ?>
      </div>
    <? endif ?>
  <? endif ?>

  <? get_template_part("./partials/post-list") ?>
  <div class="mt-4">
    <? get_template_part("./partials/page-btns") ?>
  </div>
</div>
