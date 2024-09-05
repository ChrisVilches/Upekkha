<div class="bg-slate-700 py-12 text-slate-300">
  <div class="flex flex-col items-center">
    <div class="mb-8 md:hidden">
      <? get_template_part('./partials/theme-toggle') ?>
    </div>
    <div class="mb-4">
      <? get_template_part('./partials/icons') ?>
    </div>
    <? wp_footer() ?>
    © <?= date("Y") ?> <? bloginfo('name') ?>
  </div>
</div>
