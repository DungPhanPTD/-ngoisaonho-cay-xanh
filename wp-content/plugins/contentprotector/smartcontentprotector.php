<?php/**  Plugin Name: Smart Content Protector  Description: Smart Content Protector is the Plugin to Protect your Text and Images From Copying.  Version: 7.6  Author: Fantastic Plugins *//**  Copyright 2015 Fantastic Plugins - All Rights Reserved.  This Software should not be used or changed without the permission  of Fantastic Plugins. *//** * @integrate the Admin Settings */require_once('inc/admin.php');/** * @integrate the Register settings of image protection */require_once('inc/image_protection_register_settings.php');/** * @integrate the Register Wp_List_table */include 'inc/SCP_Log_class_list_table.php';/** * @Declaring the Class */class SmartContentProtector {    public function __construct() {// Avoid Header Already Sent Problem in WooCommerce        add_action('init', array($this, 'avoid_header_already_sent_problem'));    }    public static function db_version_function() {        $db_version = 1.5;        return $db_version;    }    /**     * Creating the function register the settings fields to the options table of database.     *///version 4.3 Capture Ip Address In Client when our visit page and copy text saved in ipaddress Start    public static function avoid_header_already_sent_problem() {        ob_start();    }    public static function smartipcap() {        wp_enqueue_script('jquery');        if (get_option('smart_content_protector_ip') == '17') {            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];            } else {                $ipaddress = $_SERVER['REMOTE_ADDR'];            }            $current_user = wp_get_current_user();            if (get_option('timezone_string') != '') {                date_default_timezone_set(get_option('timezone_string'));            } else {                date_default_timezone_set('UTC');            }        }    }    public static function availbale_post_types_filter() {        $post_types = get_post_types();        $available_pt = array();        foreach ($post_types as $type) {            if (                    $type != 'shop_order' &&                    $type != 'shop_coupon' &&                    $type != 'shop_order_refund' &&                    $type != 'shop_webhook' &&                    $type != 'attachment' &&                    $type != 'revision' &&                    $type != 'nav_menu_item' &&                    $type != 'product_variation'            ) {                $available_pt[] = $type;            }        }        return $available_pt;    }    public static function register_setting_smart_content_protector() {        register_setting('smart_content_protector_general_settings', 'smart_content_protector_disable');        register_setting('smart_content_protector_text_protection_settings', 'smart_content_protector_a');        register_setting('smart_content_protector_text_protection_settings', 'smart_content_protector_c');        register_setting('smart_content_protector_text_protection_settings', 'smart_content_protector_x');        register_setting('smart_content_protector_text_protection_settings', 'smart_content_protector_v');        register_setting('smart_content_protector_text_protection_settings', 'smart_content_protector_s');        register_setting('smart_content_protector_text_protection_settings', 'smart_content_protector_u');        register_setting('smart_content_protector_text_protection_settings', 'smart_content_protector_p');        register_setting('smart_content_protector_text_protection_settings', 'smart_content_protector_i');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_alert');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_alert_message');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_page_include_exclude');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_post_include_exclude');        register_setting('smart_content_protector_text_protection_settings', 'smart_content_protector_alert_message');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_a');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_c');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_x');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_v');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_s');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_u');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_p');//version4.8 wordpress mac os        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_cmdshift4');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_cmdshift3');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_cmdctrlshift3');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_cmdshift4spacebar');        register_setting('smart_content_protector_text_protection_settings_for_mac', 'smart_content_protector_mac_i');//post type filter options        $post_types = SmartContentProtector::availbale_post_types_filter();        foreach ($post_types as $post_name) {            register_setting('smart_content_protector_general_settings', 'smart_content_protector_post_' . $post_name);        }// Version 5.1 category added        register_setting('smart_content_protector_general_settings', 'smart_content_protector_cutompa_id');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_page_include_cutom_exclude');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_category_id');//end Version 5.1        register_setting('smart_content_protector_general_settings', 'smart_content_protector_member');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_non_member');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_homepage');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_page_id');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_post_id');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_add_empty_lines');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_textarea');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_textarea_message');//register_setting('smart_content_protector_general_settings', 'smart_content_enable_right_click_link');        register_setting('smart_content_protector_general_settings', 'smart_content_enable_right_click_link1');        register_setting('smart_content_protector_general_settings', 'smart_content_enable_right_click_link2');        register_setting('smart_content_protector_general_settings', 'smart_content_enable_right_click_image_link');        register_setting('smart_content_protector_general_settings', 'plagiarism_prevent_user_highlight');        register_setting('smart_content_protector_general_settings', 'plagiarism_prevent_user_rightclick_disable');//version 4.7        global $wp_roles;//var_dump($wp_roles->role_names);        foreach ($wp_roles->role_names as $key => $value) {            register_setting('smart_content_protector_general_settings', "smart_content_protector_$key");        }// For New Version 3.5        register_setting('smart_content_protector_experimental_settings', 'smart_content_enable_print_screen');        register_setting('smart_content_protector_experimental_settings', 'smart_content_print_screen_message');//Version 3.6        register_setting('smart_content_protector_general_settings', 'smart_content_enable_js_disable_error');        register_setting('smart_content_protector_general_settings', 'smart_content_js_disable_error_msg');        register_setting('smart_content_protector_general_settings', 'smart_content_enable_view_source');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_viewoption');// version 4.2        register_setting('smart_content_protector_general_settings', 'smart_content_protector_selecting_text');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_selecting_text_msg');        register_setting('smart_content_protector_general_settings', 'smart_content_enable_js_disable_reload');        register_setting('smart_content_protector_general_settings', 'smart_content_js_disable_error_reload');//version 4.3 Admin Setting register  Start        register_setting('smart_content_protector_general_settings', 'smart_content_protector_rssfeed');        register_setting('smart_content_protector_general_settings', 'protect_rss_title');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_ip');        register_setting('smart_content_protector_general_settings', 'smart_content_protector_ip_when_pd');//        register_setting('smart_content_protector_general_settings', 'smart_content_protector_radio');//version 4.3 admin Setting register  End    }    public static function default_setting_smart_content_protector() {        add_option('smart_content_protector_image_watermark_position', 'top-left');    }    /**     * Creating the function for admin menu     */    public static function add_menu_smart_content_protector() {        add_options_page('Smart Content Protector', 'Smart Content Protector', 'manage_options', 'protector', 'smartcontentprotector_adminpage');    }    /**     * Creating the function for reseting options in the General Settings.     */    public static function reset_general_settings_smart_content_protector() {#Reset the Corresponding checkbox in the time of activation        delete_option('smart_content_protector_disable');        delete_option('smart_content_protector_member');        delete_option('smart_content_protector_non_member');        delete_option('smart_content_protector_homepage');        delete_option('smart_content_protector_add_empty_lines');        delete_option('smart_content_protector_textarea');        delete_option('plagiarism_prevent_user_highlight');        delete_option('plagiarism_prevent_user_rightclick_disable');        delete_option('smart_content_protector_textarea_message');        delete_option('smart_content_enable_view_source');        delete_option('smart_content_protector_viewoption');//added version 5.1 reset option        delete_option('smart_content_protector_cutompa_id');        delete_option('smart_content_protector_page_include_cutom_exclude');        delete_option('smart_content_protector_category_id');//end version 5.1//add_option('plagiarism_prevent_user_highlight', '1');        add_option('smart_content_protector_member', '1');        add_option('smart_content_protector_non_member', '2');        add_option('smart_content_protector_homepage', '2');        add_option('smart_content_protector_viewoption', '53');        delete_option('smart_content_protector_page_include_exclude');        delete_option('smart_content_protector_post_include_exclude');        delete_option('smart_content_protector_alert');        delete_option('smart_content_protector_alert_message');//post type filters delete option        $post_types = SmartContentProtector::availbale_post_types_filter();        foreach ($post_types as $post_name) {            delete_option('smart_content_protector_post_' . $post_name);            add_option('smart_content_protector_post_' . $post_name, $post_name);        }//delete_option('smart_content_enable_right_click_link');        delete_option('smart_content_enable_right_click_link1');        delete_option('smart_content_enable_right_click_link2');        delete_option('smart_content_enable_right_click_image_link');        delete_option('smart_content_enable_js_disable_reload');        delete_option('smart_content_js_disable_error_reload');        /*         * ****************************************** */        delete_option('smart_content_enable_print_screen');        delete_option('smart_content_print_screen_message');        add_option('smart_content_print_screen_message', '');        add_option('smart_content_print_screen_message', 'Print Screen is Disabled');        /* version 4.2 */        delete_option('smart_content_protector_selecting_text');        delete_option('smart_content_protector_selecting_text_msg');        add_option('smart_content_protector_selecting_text_msg', 'Content is Copy Protected');        /*         * ****************************************** */        add_option('smart_content_protector_alert_message', 'Right Mouse Click is Disabled');        add_option('smart_content_protector_page_include_exclude', '1');        add_option('smart_content_protector_add_empty_lines', '100');        add_option('smart_content_protector_post_include_exclude', '1');        add_option('smart_content_protector_textarea_message', 'This Post was Protected by Smart Content Protector &copy; Copyright 2013, All Rights Reserved');        delete_option('smart_content_enable_js_disable_error');        delete_option('smart_content_js_disable_error_msg');        add_option('smart_content_enable_js_disable_error', '0');        add_option('smart_content_js_disable_error_msg', 'Please Enable JavaScript in your Browser to visit this site');        delete_option('protect_rss_title');        add_option('protect_rss_title', '');    }    /**     * Creating the function for reseting options in the Text Settings.     */    public static function reset_text_settings_smart_content_protector() {#Reset the Text Protection Settings in the Time of Activation        delete_option('smart_content_protector_a');        delete_option('smart_content_protector_c');        delete_option('smart_content_protector_x');        delete_option('smart_content_protector_v');        delete_option('smart_content_protector_s');        delete_option('smart_content_protector_u');        delete_option('smart_content_protector_p');        delete_option('smart_content_protector_i');        delete_option('smart_content_protector_mac_a');        delete_option('smart_content_protector_mac_c');        delete_option('smart_content_protector_mac_x');        delete_option('smart_content_protector_mac_v');        delete_option('smart_content_protector_mac_s');        delete_option('smart_content_protector_mac_u');        delete_option('smart_content_protector_mac_p');//version4.8 wordpress mac os        delete_option('smart_content_protector_mac_cmdshift4');        delete_option('smart_content_protector_mac_cmdshift3');        delete_option('smart_content_protector_mac_cmdctrlshift3');        delete_option('smart_content_protector_mac_cmdshift4spacebar');        delete_option('smart_content_protector_mac_i');        add_option('smart_content_protector_a', '1');        add_option('smart_content_protector_c', '2');        add_option('smart_content_protector_x', '3');        add_option('smart_content_protector_v', '4');        add_option('smart_content_protector_s', '5');        add_option('smart_content_protector_u', '6');        add_option('smart_content_protector_p', '7');        add_option('smart_content_protector_i', '8');        add_option('smart_content_protector_mac_a', '1');        add_option('smart_content_protector_mac_c', '2');        add_option('smart_content_protector_mac_x', '3');        add_option('smart_content_protector_mac_v', '4');        add_option('smart_content_protector_mac_s', '5');        add_option('smart_content_protector_mac_u', '6');        add_option('smart_content_protector_mac_p', '7');//version4.8 wordpress mac os        add_option('smart_content_protector_mac_cmdshift4', '7');        add_option('smart_content_protector_mac_cmdshift3', '7');        add_option('smart_content_protector_mac_cmdctrlshift3', '7');        add_option('smart_content_protector_mac_cmdshift4spacebar', '7');        add_option('smart_content_protector_mac_i', '8');    }    public static function smart_content_overall_default_values() {        add_option('smart_content_protector_a', '1');        add_option('smart_content_protector_c', '2');        add_option('smart_content_protector_x', '3');        add_option('smart_content_protector_v', '4');        add_option('smart_content_protector_s', '5');        add_option('smart_content_protector_u', '6');        add_option('smart_content_protector_p', '7');        add_option('smart_content_protector_i', '8');        add_option('smart_content_protector_mac_a', '1');        add_option('smart_content_protector_mac_c', '2');        add_option('smart_content_protector_mac_x', '3');        add_option('smart_content_protector_mac_v', '4');        add_option('smart_content_protector_mac_s', '5');        add_option('smart_content_protector_mac_u', '6');        add_option('smart_content_protector_mac_p', '7');//version4.8 wordpress mac os        add_option('smart_content_protector_mac_cmdshift4', '7');        add_option('smart_content_protector_mac_cmdshift3', '7');        add_option('smart_content_protector_mac_cmdctrlshift3', '7');        add_option('smart_content_protector_mac_cmdshift4spacebar', '7');        add_option('smart_content_protector_mac_i', '8');        add_option('smart_content_protector_member', '1');        add_option('smart_content_protector_non_member', '2');        add_option('smart_content_protector_homepage', '2');        add_option('smart_content_protector_viewoption', '53');        add_option('smart_content_print_screen_message', 'Print Screen is Disabled');        add_option('smart_content_protector_selecting_text_msg', 'Content is Copy Protected');        /*         * ****************************************** */        add_option('smart_content_protector_alert_message', 'Right Mouse Click is Disabled');        add_option('smart_content_protector_page_include_exclude', '1');        add_option('smart_content_protector_add_empty_lines', '100');        add_option('smart_content_protector_post_include_exclude', '1');        add_option('smart_content_protector_textarea_message', 'This Post was Protected by Smart Content Protector &copy; Copyright 2013, All Rights Reserved');        add_option('smart_content_enable_js_disable_error', '0');        add_option('smart_content_js_disable_error_msg', 'Please Enable JavaScript in your Browser to visit this site');//post type filters default add option        $post_types = SmartContentProtector::availbale_post_types_filter();        foreach ($post_types as $post_name) {            add_option('smart_content_protector_post_' . $post_name, $post_name);        }    }    public static function smart_content_protector_common_function() {        ob_start();        if (get_option('smart_content_protector_homepage') == '1') {            if (is_home() || is_front_page()) {                include('inc/plagiarism_prevent.php');            }        }        if (get_option('smart_content_protector_homepage') == '50') {            if (!(is_home() || is_front_page())) {                include('inc/plagiarism_prevent.php');            }        }        if (get_option('smart_content_protector_homepage') == '2') {            include('inc/plagiarism_prevent.php');        }        if (get_option('smart_content_protector_homepage') == '4') {            if (is_page()) {                include('inc/plagiarism_prevent.php');            }        }        if (get_option('smart_content_protector_homepage') == '5') {            if (is_single()) {                include('inc/plagiarism_prevent.php');            }        }        if (get_option('smart_content_protector_homepage') == '3') {            $page_id = get_option('smart_content_protector_page_id');            if (!empty($page_id)) {                if (is_page()) {                    $page_seperate = explode(',', $page_id);                    if (get_option('smart_content_protector_page_include_exclude') == '1') {                        if (is_page($page_seperate)) {                            include('inc/plagiarism_prevent.php');                        }                    }                    if (get_option('smart_content_protector_page_include_exclude') == '2') {                        if (!is_page($page_seperate)) {                            include('inc/plagiarism_prevent.php');                        }                    }                }            }            $post_id = get_option('smart_content_protector_post_id');            if (!empty($post_id)) {                if (is_single()) {                    $post_seperate = explode(',', $post_id);                    if (get_option('smart_content_protector_post_include_exclude') == '1') {                        if (is_single($post_seperate)) {                            include('inc/plagiarism_prevent.php');                        }                    }if (get_option('smart_content_protector_post_include_exclude') == '2') {                        if (!is_single($post_seperate)) {                            include('inc/plagiarism_prevent.php');                        }                    }                }            }        }        if (get_option('smart_content_protector_homepage') == '6') {            if (is_single()) {                global $post;                $get_category = get_the_terms($post->ID, 'category');                if (!empty($get_category)) {                    include('inc/plagiarism_prevent.php');                }            }            if (is_category()) {                include('inc/plagiarism_prevent.php');            }        }        $cusutom_id = get_option('smart_content_protector_cutompa_id');        if (!empty($cusutom_id)) {            if (is_category()) {                $post_seperate = explode(',', $cusutom_id);// var_dump($post_seperate);                if (get_option('smart_content_protector_page_include_cutom_exclude') == '1') {                    if (is_category($post_seperate)) {                        include('inc/plagiarism_prevent.php');                    }                }if (get_option('smart_content_protector_page_include_cutom_exclude') == '2') {                    if (!is_category($post_seperate)) {                        include('inc/plagiarism_prevent.php');                    }                }            }            if (is_single()) {                global $post;                $get_category = get_the_terms($post->ID, 'category');                if ($get_category && !empty($get_category)) {                    $current_category_slugs = array();                    $current_category_ids = array();                    $current_category_name = array();                    foreach ($get_category as $value) {                        $current_category_slugs[] = $value->slug;                        $current_category_ids[] = $value->term_id;                        $current_category_name[] = $value->name;                    }                }                $post_seperate = explode(',', $cusutom_id);                $current_category_ids = array_intersect($current_category_ids, $post_seperate);                $current_category_name = array_intersect($current_category_name, $post_seperate);                $current_category_slugs = array_intersect($current_category_slugs, $post_seperate);                if ($current_category_ids || $current_category_name || $current_category_slugs) {                    if (get_option('smart_content_protector_page_include_cutom_exclude') == '1') {                        include('inc/plagiarism_prevent.php');                    }                } else {                    if (get_option('smart_content_protector_page_include_cutom_exclude') == '2') {                        include('inc/plagiarism_prevent.php');                    }                }            }        }        return ob_get_clean();    }    /**     * Main Function to protect the content     */    public static function allinone_contentprotector() {        if (get_option('smart_content_protector_disable') != 1) {            if (get_option('smart_content_protector_non_member') == 2) {                if (!is_user_logged_in()) {                    echo self::smart_content_protector_common_function();                }            }            if (get_option('smart_content_protector_member') == 1) {                if (is_user_logged_in()) {                    echo self::smart_content_protector_common_function();                }            }            if (get_option('smart_content_protector_member') == 3) {                if (is_user_logged_in()) {                    $userid = get_current_user_id();                    $dataofuser = get_userdata($userid);                    $getrole = $dataofuser->roles[0];                    $checkcondition = get_option("smart_content_protector_$getrole");                    if ($checkcondition == $getrole) {                        echo self::smart_content_protector_common_function();                    }                }            }        }    }    public static function plugin_settings_link($links) {        $settings_link = '<a href="options-general.php?page=protector">Settings</a>';        array_unshift($links, $settings_link);        return $links;    }}function jquery_add_to_header() {    wp_register_script('jquery_prettyphoto', WP_PLUGIN_URL . '/contentprotector/js/jquery.prettyPhoto.js', array('jquery'));    wp_enqueue_script('jquery_prettyphoto');    wp_register_style('prettyphotocss', WP_PLUGIN_URL . '/contentprotector/css/prettyPhoto.css');    wp_enqueue_style('prettyphotocss');}//version4.8 wordpress watermarkfunction fp_jquery_watermark_for_image() {    wp_enqueue_script('jquery');    wp_register_script('jquery_watermark', WP_PLUGIN_URL . '/contentprotector/js/jquery.watermark.js', array('jquery'));//wp_localize_script('jquery_watermark', 'position_change', array('edge' => get_option('smart_content_protector_position_normal')));    wp_enqueue_script('jquery_watermark');}function load_wp_fp_media_files() {    wp_enqueue_media();}add_action('admin_enqueue_scripts', 'load_wp_fp_media_files');add_action('wp_enqueue_scripts', 'fp_jquery_watermark_for_image');/* * Including Pretty photo only when lightbox is enabled */if (get_option('smart_content_protector_image_protection') == '2') {    add_action('wp_enqueue_scripts', 'jquery_add_to_header');}//if (get_option('smart_content_protector_image_watermark') == '7') {//    add_action('wp_enqueue_scripts', 'fp_jquery_watermark_for_image');//}////if (get_option('smart_content_protector_default_image_watermark') == '8') {//    add_action('wp_enqueue_scripts', 'fp_jquery_watermark_for_image');//}add_action('wp_footer', array('SmartContentProtector', 'smartipcap'));if (isset($_POST["reset_text_protection"])) {    add_action('admin_init', array('SmartContentProtector', 'reset_text_settings_smart_content_protector'));}if (isset($_POST["reset_general"])) {    add_action('admin_init', array('SmartContentProtector', 'reset_general_settings_smart_content_protector'));}if (isset($_POST["reset_image_settings"])) {    add_action('admin_init', 'reset_image_protection');}function line_break() {    ob_start();    $break = "\n";    for ($i = 0; $i <= get_option('smart_content_protector_add_empty_lines'); $i++) {        echo $break;    }}//version4.3 wordpress enqueue script Start connect the location hookfunction scadminenqueue() {    wp_enqueue_script('jquery');    wp_enqueue_script('scfootable', plugins_url('contentprotector/js/', dirname(__FILE__)) . 'footable.js');    wp_enqueue_script('scfootablepaginate', plugins_url('contentprotector/js/', dirname(__FILE__)) . 'footable.paginate.js');    wp_enqueue_script('scfootablesorting', plugins_url('contentprotector/js/', dirname(__FILE__)) . 'footable.sort.js');//version4.8 wordpress watermark// wp_enqueue_script('scwatermark', plugins_url('contentprotector/js/', dirname(__FILE__)) . 'watermark.js');    wp_enqueue_script('scfootablefilter', plugins_url('contentprotector/js/', dirname(__FILE__)) . 'footable.filter.js');    wp_enqueue_style('scbootstrapcss', plugins_url('contentprotector/css/', dirname(__FILE__)) . 'footable.core.css');    wp_enqueue_style('scpagination', plugins_url('contentprotector/css/', dirname(__FILE__)) . 'footable.standalone.css');}add_action('admin_enqueue_scripts', 'scadminenqueue');//Versin 4.3 wordpress enqueue script Endif (!is_admin()) {    if (get_option('smart_content_enable_view_source') == '1') {        if (get_option('smart_content_protector_viewoption') == '53') {            add_action('wp_head', 'line_break');        } else {            if (get_option('smart_content_protector_viewoption') == '54') {                add_action('wp', 'line_break');            }        }    }}$plugin = plugin_basename(__FILE__);add_filter("plugin_action_links_$plugin", array('SmartContentProtector', 'plugin_settings_link'));add_action('wp_footer', array('SmartContentProtector', 'allinone_contentprotector'));//register_activation_hook(__FILE__, array('SmartContentProtector', 'reset_general_settings_smart_content_protector'));register_activation_hook(__FILE__, array('SmartContentProtector', 'smart_content_overall_default_values'));register_activation_hook(__FILE__, array('SmartContentProtector', 'default_setting_smart_content_protector'));add_action('admin_init', array('SmartContentProtector', 'default_setting_smart_content_protector'));add_action('admin_init', array('SmartContentProtector', 'register_setting_smart_content_protector'));add_action('admin_menu', array('SmartContentProtector', 'add_menu_smart_content_protector'));add_action('admin_init', 'register_settings_image_protection');add_action('admin_init', 'csv_tableopen');//Export CSV Process 4.3function csv_tableopen() {    if (isset($_POST['sccsv'])) {        global $wpdb;        $ipresult = $wpdb->get_results("SELECT * FROM wp_smartiplog");// header('Cache-Control: max-age=0');        ob_end_clean();        header("Content-type: text/csv");        header("Content-Disposition: attachment; filename=data_" . date("Y-m-d") . ".csv");        header("Pragma: no-cache");        header("Expires: 0");        foreach ($ipresult as $result) {//$ipconfig .= $result->ipaddress.",".$result->id.",". $result->time.",".$result->username.",".$result->whichpage."\n";            $filedname = "IP Address,Date/Year/Time,Username,Which Page / Post" . "\n";            $mainconfig[] = array($result->ipaddress, $result->time, $result->username, $result->whichpage);        }        echo $filedname;//echo $ipconfig;        $output = fopen("php://output", "w");        foreach ($mainconfig as $values) {            fputcsv($output, $values);        }fclose($output);        exit();    }}//register_activation_hook(__FILE__, 'reset_image_protection');//disable Rss Feed Startfunction smart_disable_feed() {    if (get_option('smart_content_protector_rssfeed') == '16') {        add_filter('wp_die_handler', 'custom_handler_function');        wp_die();    }}function custom_handler_function($message, $title = '', $args = array()) {    return _default_wp_die_handler(__('No Rss Feed available, please visit our  <a href="' . site_url() . '">Homepage!</a>'), get_option('protect_rss_title'), $args);}add_action('do_feed', 'smart_disable_feed', 1);add_action('do_feed_rdf', 'smart_disable_feed', 1);add_action('do_feed_rss', 'smart_disable_feed', 1);add_action('do_feed_rss2', 'smart_disable_feed', 1);add_action('do_feed_atom', 'smart_disable_feed', 1);//Rss Feed End//version 4.3 Login User Details Startfunction scinserttable() {    global $wpdb;    if ($_POST['userid'] == '') {        $guest = "Guest";    } else {        $guest = $_POST['userid'];    }    $ip_address = $_POST['ipaddress'];    $whichpage = $_POST['whichpage'];    $row = array();    $row = $wpdb->get_results("SELECT * FROM wp_smartiplog WHERE ipaddress = '$ip_address' AND whichpage = '$whichpage'");    if (empty($row)) {        $wpdb->insert('wp_smartiplog', array('time' => $_POST['date'], 'ipaddress' => $ip_address, 'username' => $guest, 'whichpage' => $whichpage));    }    exit();}add_action('wp_ajax_my_action', 'scinserttable');add_action('wp_ajax_nopriv_my_action', 'scinserttable');//delete the rowfunction scdeleterowintable() {    global $wpdb;    $wpdb->delete('wp_smartiplog', array('ID' => $_POST['dataid']));    // echo "Success";    exit();}function prevent_based_on_post_type() {    if (get_option('smart_content_protector_homepage') == '8') {        $current_post_type = get_post_type();        //post type filters delete option        $post_types = SmartContentProtector::availbale_post_types_filter();        foreach ($post_types as $post_name) {            $settings_post_type_values = get_option('smart_content_protector_post_' . $post_name);            //echo $settings_post_type_values;            if ($current_post_type == $settings_post_type_values) {                include('inc/plagiarism_prevent.php');            }        }    }}add_action('wp_ajax_scdeletelog', 'scdeleterowintable');add_action('wp_ajax_nopriv_scdeletelog', 'scdeleterowintable');add_action('wp_head', 'prevent_based_on_post_type');//add_action('wp_head','availbale_post_types_filter');//version 4.3 login user details End// version 4.3 Mysql Table Creat Startfunction smartipcopylog() {    global $wpdb;    $Smart_Ipcopy = '';    if (!empty($wpdb->charset)) {        $Smart_Ipcopy = "DEFAULT CHARACTER SET {$wpdb->charset}";    }    if (!empty($wpdb->collate)) {        $Smart_Ipcopy .= " COLLATE {$wpdb->collate}";    }    $db_version = SmartContentProtector::db_version_function();    $updated_db_version = get_option('updated_db_version');    if ($db_version != $updated_db_version) {        $smartsql = "CREATE TABLE IF NOT EXISTS wp_smartiplog (id mediumint(9) NOT NULL AUTO_INCREMENT, time LONGTEXT NOT NULL, ipaddress LONGTEXT NOT NULL, username VARCHAR(250) NOT NULL, whichpage VARCHAR(120) NOT NULL, UNIQUE KEY id (id)) $Smart_Ipcopy;";        //version 4.3 Mysql Table Create End        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );        dbDelta($smartsql);        update_option('updated_db_version', $db_version);    }}register_activation_hook(__FILE__, 'smartipcopylog');