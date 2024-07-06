<!--
TODO: This page was copied from here.
https://developer.wordpress.org/themes/functionality/sidebars/
-->

<div id="primary" class="sidebar">

	<?php do_action( 'before_sidebar' ); ?>

	<?php if ( ! dynamic_sidebar( 'sidebar-primary' ) ) : ?>

		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside><!-- #search -->

		<aside id="archives" class"widget">
			<h3 class="widget-title"><?php _e( 'Archives', 'shape' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside><!-- #archives -->

		<aside id="meta" class="widget">
			<h3 class="widget-title"><?php _e( 'Meta', 'shape' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside><!-- #meta -->

	<?php endif; ?>

</div><!-- #primary -->
