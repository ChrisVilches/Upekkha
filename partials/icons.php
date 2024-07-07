<?
$prefix = uniqid() . "-";
?>

<div class="flex space-x-2 justify-center">
  <? foreach (CustomTheme::$social_sites as $site => $data) : ?>
    <?
    $url = get_theme_mod('social-sites-' . $site);
    ?>
    <? if (!empty($url)) :  ?>
      <a data-tooltip-target="<?= $prefix . $site ?>-social" href="<?= $url ?>" target="_blank" class="<?= $data['class'] ?> size-10 flex items-center border-black justify-center bg-transparent text-slate-400 rounded-md transition-colors duration-500">
        <i class="fa-brands fa-<?= $data['fa-icon'] ?>"></i>
      </a>

      <div id="<?= $prefix . $site ?>-social" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
        <?= $data['label'] ?>
        <div class="tooltip-arrow" data-popper-arrow></div>
      </div>
    <? endif ?>
  <? endforeach ?>

  <a data-tooltip-target="<?= $prefix ?>rss" href="<?= get_feed_link() ?>" target="_blank" class="hover:text-orange-400 size-10 flex items-center border-black justify-center bg-transparent text-slate-400 rounded-md transition-colors duration-500">
    <i class="fa-solid fa-rss"></i>
  </a>

  <div id="<?= $prefix ?>rss" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
    RSS Feed
    <div class="tooltip-arrow" data-popper-arrow></div>
  </div>
</div>
