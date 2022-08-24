<?php
/**
 * Kukun functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kukun
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'CHILD_THEME_DIR', trailingslashit( get_theme_file_path()));

/** 
 * Setup helper functions of Child Theme
 */
require_once CHILD_THEME_DIR . 'inc/custom-functions.php';