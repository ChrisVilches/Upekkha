<? if ($tags = get_the_tags()) : ?>
  <? foreach ($tags as $tag) : ?>
    <a href="<?= get_tag_link($tag) ?>" class="inline-block rounded-md p-2 text-slate-600 dark:text-slate-200">
      <i class="fa fa-hashtag mr-1.5"></i><?= $tag->name ?>
    </a>
  <? endforeach ?>
<? endif ?>
