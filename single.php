<?php get_header(); ?>

<main role="main">
    <section>

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                <?php endif; ?>
                <h1>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h1>
                <span class="date"><?php the_time('F j, Y'); ?><?php the_time('g:i a'); ?></span>
                <span class="author"><?php _e('Published by', 'html5blank'); ?><?php the_author_posts_link(); ?></span>
                <span class="comments"><?php if (comments_open(get_the_ID())) comments_popup_link(__('Leave your thoughts', 'blank_theme'), __('1 Comment', 'blank_theme'), __('% Comments', 'blank_theme')); ?></span>

                <?php the_content(); ?>

                <?php the_tags(__('Tags: ', 'blank_theme'), ', ', '<br>'); ?>

                <p><?php _e('Categorised in: ', 'blank_theme');
                    the_category(', '); ?></p>

                <p><?php _e('This post was written by ', 'blank_theme');
                    the_author(); ?></p>

                <?php edit_post_link(); ?>

                <?php comments_template(); ?>

            </article>
        <?php endwhile; ?>

        <?php else: ?>
            <article>

                <h1><?php _e('Sorry, nothing to display.', 'blank_theme'); ?></h1>

            </article>

        <?php endif; ?>

    </section>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
