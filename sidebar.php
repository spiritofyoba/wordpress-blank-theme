<aside class="sidebar col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3" role="complementary">

    <?php get_template_part('searchform'); ?>

    <div class="sidebar-widget">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
    </div>

    <div class="sidebar-widget">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
    </div>

</aside>
