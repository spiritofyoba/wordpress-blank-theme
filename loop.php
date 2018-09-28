<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail(array(120, 120)); ?>
            </a>
        <?php endif; ?>

        <h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h2>

        <span class="date"><?php the_time('F j, Y'); ?><?php the_time('g:i a'); ?></span>
        <span class="author"><?php _e('Published by', 'blank_theme'); ?><?php the_author_posts_link(); ?></span>
        <span class="comments"><?php if (comments_open(get_the_ID())) comments_popup_link(__('Leave your thoughts', 'blank_theme'), __('1 Comment', 'blank_theme'), __('% Comments', 'blank_theme')); ?></span>
        <!-- /post details -->

        <?php the_excerpt(); ?>

        <?php edit_post_link(); ?>

    </article>

<?php endwhile; ?>

<?php else: ?>

    <article>
        <h2><?php _e('Sorry, nothing to display.', 'blank_theme'); ?></h2>
    </article>

<?php endif; ?>
