<? $query = CustomTheme::get_related_posts() ?>

<? if ($query->post_count > 0) : ?>
  <hr class="w-1/2 h-0.5 mx-auto my-20 bg-gray-300 dark:bg-gray-600 border-0">

  <h2 class="text-center mb-10">You might also like</h2>

  <div class="sm:px-20 md:px-40">
    <div class="relative w-full" data-carousel="slide">
      <div class="relative h-56 overflow-hidden md:h-80">
        <?
        if ($query->have_posts()) :
          while ($query->have_posts()) :
            $query->the_post();

        ?>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <a href="<?= the_permalink() ?>" class="group flex justify-center items-center h-full absolute w-full bg-white">
                <div class="w-3/4 md:w-1/2 flex justify-center items-center h-full">
                  <p class="font-bold md:text-lg text-slate-200 group-hover:text-slate-100 duration-300 transition-colors z-50 text-center bg-slate-800/80 p-2 rounded-md">
                    <? the_title() ?>
                  </p>
                </div>
                <? if (has_post_thumbnail()) : ?>
                  <? the_post_thumbnail('post-thumbnail', array("class" => "absolute opacity-80 group-hover:opacity-70 duration-300 transition-opacity object-cover w-full h-full")) ?>
                <? endif ?>
              </a>
            </div>
        <?
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>

      <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <? foreach (range(0, $query->post_count - 1) as $index) : ?>
          <button data-carousel-indicator type="button" class="w-3 h-3 rounded-full" aria-label="Slide <?= $index ?>" data-carousel-slide-to="<?= $index ?>"></button>
        <? endforeach ?>
      </div>

      <button data-carousel-prev type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group text-slate-100 bg-slate-400/30 hover:bg-slate-500/50 transition-colors duration-400">
        <span class="inline-flex items-center justify-center w-10 h-10">
          <i class="fa-solid fa-chevron-left"></i>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button data-carousel-next type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group text-slate-100 bg-slate-400/30 hover:bg-slate-500/50 transition-colors duration-400">
        <span class="inline-flex items-center justify-center w-10 h-10">
          <i class="fa-solid fa-chevron-right"></i>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
  </div>
<? endif ?>
