<!-- TODO: Not working. Scripts are added at the top -->

<!-- TODO: Make header and footer use 100% width when screen is small 
           Actually remove the margin to the main content as well (just like in my blog)
-->

<div class="bg-slate-700 py-12 text-slate-300">
  <div class="flex flex-col items-center">
    <div class="mb-4">
      <? get_template_part('./partials/icons') ?>
    </div>
    <? wp_footer() ?>
    © <?= date('Y') ?> <? bloginfo('name') ?>
  </div>
</div>
