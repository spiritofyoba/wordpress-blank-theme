<?php get_header(); ?>
<main role="main">
    <div class="container">
        <section class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">

            <h1><?php the_title(); ?></h1>

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_content(); ?>

					<?php comments_template( '', true ); ?>

                    <br class="clear">

					<?php edit_post_link(); ?>

                </article>

			<?php endwhile; ?>

			<?php else: ?>

                <article>

                    <h2><?php _e( 'Sorry, nothing to display.', 'blank_theme' ); ?></h2>

                </article>

			<?php endif; ?>

        </section>

		<?php get_sidebar(); ?>
    </div>
</main>
<?php get_footer(); ?>
