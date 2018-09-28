<?php get_header(); ?>

<div class="container">
    <div class="row">
        <main role="main" class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
            <!-- section -->
            <section>

                <h1><?php _e( 'Latest Posts', 'blank_theme' ); ?></h1>

			    <?php get_template_part( 'loop' ); ?>

			    <?php get_template_part( 'pagination' ); ?>

            </section>
            <!-- /section -->
        </main>
	    <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
