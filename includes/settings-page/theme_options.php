<?php
require_once "base/Setting_page.php";
add_action('init', array('Blank_Theme_Options', 'init'));


class Blank_Theme_Options extends Setting_page
{
    /**
     * Declaration of variables
     */
    const DEFAULT_TAB = 'global_page';
    public static $initiated = false;
    public static $setting_class = 'Blank_Theme_Options';
    public static $page_name = 'Theme Options';
    public static $setting_page_name = '';
    public static $page_position = 58;
    public static $textdomain = 'blank_theme_options';
    public static $page_url = 'blank_theme_options';
    public static $default_tab = 'global_page';
    public static $allowed = array();
    public static $tabs = array(
        self::DEFAULT_TAB => 'General options',
        'social_tab' => 'Social',
        'shortcodes_tab' => 'Shortcodes'
    );

    public static function init_hooks()
    {
        self::$initiated = true;
        add_action('admin_menu', array(self::$setting_class, 'add_theme_setting_page'));
    }

    public static function global_page($tab)
    { ?>
        <div class="tab-inner">
            <form method="post" class="tab-inner-post">
                <?php
                static::render_other_fields($tab);
                ?>
                <input type="submit" value="Save" class="button button-primary button-large">
            </form>
        </div>
        <?php
    }

    public static function social_tab($tab)
    { ?>
        <div class="tab-inner">
            <form method="post" class="tab-inner-post">
                <?php
                static::render_other_fields($tab);
                ?>
                <input type="submit" value="Save" class="button button-primary button-large">
            </form>
        </div>
        <?php
    }

    public static function shortcodes_tab($tab)
    {
        static::render_other_fields($tab);
    }

    public static function get_form_fields()
    {
        return array(
            'global_page' => array(
                'global_area' => array(
                    'name' => 'Global Settings Area',
//                    'name_popup' => array(
//                        'id' => 'name_popup_id',
//                        'label' => 'Name popup content',
//                        'name' => 'name_popup',
//                        'type' => 'text',
//                        'class' => '',
//                        'default' => 'get_option' // get_option("{$this[name]}")
//                    ),
                ),
            ),
            'social_tab' => array(
                'global_area' => array(
                    'name' => 'Social Tab',
                ),
            ),
            'shortcodes_tab' => array(
                'global_area' => array(
                    'name' => 'Shortcodes Tab',
                ),
            ),
        );
    }

    public static function add_theme_setting_page()
    {
        add_menu_page(self::$page_name, self::$page_name, 'edit_posts', self::$page_url, array(self::$setting_class, 'top_level_setting_page'), 'dashicons-admin-site', self::$page_position);
    }
}
