<?php
/** ================================= Thêm File CSS, JS trong Admin ================================= */
    function admin_style_login() {
        wp_enqueue_style( 'kukun_admin_style_login', get_stylesheet_directory_uri() . '/style-admin-login.min.css' );
    }
    add_action('login_head', 'admin_style_login');

    function admin_style_nomal(){
        wp_enqueue_style( 'kukun_admin_style_nomal', get_stylesheet_directory_uri() . '/style-admin-nomal.min.css' );
    }
    add_action( 'admin_enqueue_scripts', 'admin_style_nomal');

    function hide_style_advanced(){
        global $current_user;
        $user_id = get_current_user_id();
            if($user_id != '1'){
                /** ================================= Thêm File CSS, JS trong Admin Nếu User có ID != 1 ================================= */
                function admin_style_advanced(){
                    wp_enqueue_style( 'kukun_admin_style_advanced', get_stylesheet_directory_uri() . '/style-admin-advanced.min.css' );
                }
                add_action( 'admin_enqueue_scripts', 'admin_style_advanced');
            }
      }
      add_action('admin_init', 'hide_style_advanced');



/** ================================= Thêm File CSS, JS ngoài site public ================================= */
    function child_enqueue_styles() {
        wp_enqueue_style( 'kukun-style', get_stylesheet_directory_uri() . '/style.min.css');
    }
    add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 200 );

    /** Thêm File JS */
    function child_enqueue_scripts() {
        wp_enqueue_script( 'kukun-jquery', get_stylesheet_directory_uri() . '/js/jquery/jquery.min.js');
        wp_enqueue_script( 'kukun-javascript', get_stylesheet_directory_uri() . '/js/kukun-child-theme-custom.min.js');
    }
    add_action( 'wp_footer', 'child_enqueue_scripts' );
