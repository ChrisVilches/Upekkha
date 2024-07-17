<?
$prefix = uniqid('a') . "-";
?>

<div class="flex space-x-2 justify-center">
  <? foreach (CustomTheme::$social_sites as $site => $data) : ?>
    <?
    $value = get_theme_mod('social-sites-' . $site);
    if (empty($value)) continue;
    ?>
    <? if ($site == "line") : ?>
      <div x-data="lineQr">
        <button @click="loadQr" data-modal-target="<?= $prefix . $site ?>-modal" data-modal-toggle="<?= $prefix . $site ?>-modal" type="button" data-tooltip-target="<?= $prefix . $site ?>-tooltip" class="<?= $data['class'] ?> size-10 flex items-center border-black justify-center bg-transparent text-slate-400 rounded-md transition-colors duration-500">
          <i class="fa-brands fa-<?= $data['fa-icon'] ?>"></i>
        </button>
        <div class="absolute">
          <? get_template_part('./partials/line-modal', null, array(
            "modal-id" => $prefix . $site . "-modal",
            "line-id" => $value
          )) ?>
        </div>
      </div>
    <? else : ?>
      <a data-tooltip-target="<?= $prefix . $site ?>-tooltip" href="<?= $value ?>" target="_blank" class="<?= $data['class'] ?> size-10 flex items-center border-black justify-center bg-transparent text-slate-400 rounded-md transition-colors duration-500">
        <i class="fa-brands fa-<?= $data['fa-icon'] ?>"></i>
      </a>
    <? endif ?>

    <div id="<?= $prefix . $site ?>-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
      <?= $data['label'] ?>
      <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
  <? endforeach ?>

  <a data-tooltip-target="<?= $prefix ?>rss" href="<?= get_feed_link() ?>" target="_blank" class="hover:text-orange-400 size-10 flex items-center border-black justify-center bg-transparent text-slate-400 rounded-md transition-colors duration-500">
    <i class="fa-solid fa-rss"></i>
  </a>

  <div id="<?= $prefix ?>rss" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
    RSS Feed
    <div class="tooltip-arrow" data-popper-arrow></div>
  </div>
</div>
