<?
$search_query = get_search_query();
$filter = ThemeUtil::get_filter_condition();
$archive_date = ThemeUtil::get_archive_date_fmt();
?>

<div class="px-4 md:px-10">
  <? if ($search_query || $filter || $archive_date) : ?>
    <div class="flex flex-col space-y-4 mb-10 bg-slate-200 border-slate-600 dark:bg-slate-700 dark:border-slate-950 border-[1px] p-4">
      <? if ($archive_date) : ?>
        <div>
          <span class="font-bold">Archive:</span> <?= $archive_date ?>
        </div>
      <? endif ?>

      <? if ($search_query) : ?>
        <div>
          <span class="font-bold">Search results for:</span> <?= $search_query ?>
        </div>
      <? endif ?>

      <? if ($filter) : ?>
        <div>
          <span class="font-bold"><?= $filter[
              "taxonomy"
          ] ?>:</span> <?= $filter["value"] ?>
        </div>
      <? endif ?>
    </div>

    <? if ($search_query && !have_posts()) : ?>
      <div class="prose md:prose-lg dark:prose-invert max-w-none prose-a:no-underline">
        <p>
          Nothing found. Please try again with some different keywords.
        </p>
      </div>

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
