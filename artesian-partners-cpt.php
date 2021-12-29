<?php
/**
 * @package artesian-partners-cpt
 * @version 1.0.5
 */
/*
Plugin Name: Artesian Partners CPT
Plugin URI: http://wpwebdevelopment.com
Description: Establishes custom post types for different level of partners to display their information as well as setting up a post type linked to custom woocommerce product combinations
Author: Matthew Payne
Version: 1.0.5
Author URI: http://wpwebdevelopment.com
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Include files that register posts and set up custom fields
include( plugin_dir_path( __FILE__ ) . 'includes/acpt_register_posts.php');
include( plugin_dir_path( __FILE__ ) . 'includes/acpt_register_fields.php');

// Run functions on plugin init to register post types and fields
add_action( 'init', 'register_partners_cpt' );
add_action( 'init', 'register_partner_fields' );

// Flush rewrites on activation
function apcpt_activation() {
	
    // Exit if user does not have admin privliges
    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }
    
        register_partners_cpt();
        flush_rewrite_rules();
    }
    
    register_activation_hook( __FILE__, 'apcpt_activation' );
    
    // Flush our rewrite rules on deactivation.
     
    function apcpt_deactivation() {
        
    // Exit if user does not have admin privliges
    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }
    
        flush_rewrite_rules();
    }
    register_deactivation_hook( __FILE__, 'apcpt_deactivation' );
    