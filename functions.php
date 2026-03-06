<?php
/**
 * IMC Scarlet Functions and Definitions
 * @package IMC_Scarlet
 * @author imc.ge
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function imc_scarlet_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'elementor-full-width' );
    
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'imc-scarlet' ),
    ) );
}
add_action( 'after_setup_theme', 'imc_scarlet_setup' );

/**
 * Enqueue Scripts and Styles from GitHub CDN (vtch-dev/imc-scarlet)
 */
function imc_scarlet_assets() {
    $user = 'vtch-dev';
    $repo = 'imc-scarlet';
    $version = '1.0.0';

    // Core CSS from GitHub
    wp_enqueue_style( 'scarlet-core', "https://cdn.jsdelivr.net/gh/{$user}/{$repo}/scarlet-core.css", array(), $version );

    // Core JS from GitHub
    wp_enqueue_script( 'scarlet-core', "https://cdn.jsdelivr.net/gh/{$user}/{$repo}/scarlet-core.js", array(), $version, true );

    // Google Fonts
    wp_enqueue_style( 'scarlet-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'imc_scarlet_assets' );

/**
 * Custom Admin Branding
 */
function imc_scarlet_admin_branding() {
    ?>
    <style>
        #wp-admin-bar-wp-logo { display: none !important; }
        #wp-admin-bar-imc-logo img { width: 20px; height: auto; margin-right: 5px; }
    </style>
    <?php
}
add_action('admin_head', 'imc_scarlet_admin_branding');

function imc_scarlet_admin_bar( $wp_admin_bar ) {
    $wp_admin_bar->add_node( array(
        'id'    => 'imc-logo',
        'title' => '<img src="https://imc.ge/imc-sticker-2.svg" alt="imc"> imc.ge',
        'href'  => 'https://imc.ge',
        'meta'  => array( 'target' => '_blank' )
    ) );
}
add_action( 'admin_bar_menu', 'imc_scarlet_admin_bar', 10 );