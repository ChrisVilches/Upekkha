<h2 class="text-center mb-10">About <?= $args['author']->display_name ?></h2>

<div class="md:flex">
  <div class="flex justify-center mb-8">
    <?= get_avatar($args['author']->ID, 64, null, null, array("class" => "rounded-full")) ?>
  </div>

  <div class="grow px-10 text-center md:text-start mb-8 text-base md:text-base-plus">
    <?= $args['author']->description ?>
  </div>
</div>

<? if (!empty($args['author']->user_url)) : ?>
  <div class="flex justify-end mt-2">
    <a data-tooltip-target="author-website-tooltip" href="<?= $args['author']->user_url ?>" target="_blank" class="size-10 flex items-center border-black justify-center hover:bg-slate-700 bg-slate-800 text-slate-200 hover:text-slate-100 rounded-md transition-colors duration-200">
      <i class="fa fa-house"></i>
    </a>

    <div id="author-website-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
      Website
      <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
  </div>
<? endif ?>
