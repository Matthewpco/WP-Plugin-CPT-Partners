<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function register_partners_cpt() {

/**
 * Creates custom post types and custom fields for partners pages, as well as woocommerce custom product builder
 * Post Type: Partners
 */

$labels = [
    "name" => __( "partners", "hello-elementor-child" ),
    "singular_name" => __( "partner", "hello-elementor-child" ),
    "menu_name" => __( "Partners", "hello-elementor-child" ),
    "all_items" => __( "All partners", "hello-elementor-child" ),
    "add_new" => __( "Add new", "hello-elementor-child" ),
    "add_new_item" => __( "Add new partner", "hello-elementor-child" ),
    "edit_item" => __( "Edit partner", "hello-elementor-child" ),
    "new_item" => __( "New partner", "hello-elementor-child" ),
    "view_item" => __( "View partner", "hello-elementor-child" ),
    "view_items" => __( "View partners", "hello-elementor-child" ),
    "search_items" => __( "Search partner", "hello-elementor-child" ),
    "not_found" => __( "No partners found", "hello-elementor-child" ),
    "not_found_in_trash" => __( "No partners found in trash", "hello-elementor-child" ),
    "parent" => __( "Parent partner:", "hello-elementor-child" ),
    "featured_image" => __( "Featured image for this partner", "hello-elementor-child" ),
    "set_featured_image" => __( "Set featured image for this partner", "hello-elementor-child" ),
    "remove_featured_image" => __( "Remove featured image for this partner", "hello-elementor-child" ),
    "use_featured_image" => __( "Use as featured image for this partner", "hello-elementor-child" ),
    "archives" => __( "Partner archives", "hello-elementor-child" ),
    "insert_into_item" => __( "Insert into partner", "hello-elementor-child" ),
    "uploaded_to_this_item" => __( "Upload to this partner", "hello-elementor-child" ),
    "filter_items_list" => __( "Filter partners list", "hello-elementor-child" ),
    "items_list_navigation" => __( "Partners list navigation", "hello-elementor-child" ),
    "items_list" => __( "Partners list", "hello-elementor-child" ),
    "attributes" => __( "Partners attributes", "hello-elementor-child" ),
    "name_admin_bar" => __( "Partner", "hello-elementor-child" ),
    "item_published" => __( "Partner published", "hello-elementor-child" ),
    "item_published_privately" => __( "Partner published privately.", "hello-elementor-child" ),
    "item_reverted_to_draft" => __( "Partner reverted to draft.", "hello-elementor-child" ),
    "item_scheduled" => __( "Partner scheduled", "hello-elementor-child" ),
    "item_updated" => __( "Partner updated.", "hello-elementor-child" ),
    "parent_item_colon" => __( "Parent partner:", "hello-elementor-child" ),
];

$args = [
    "label" => __( "partners", "hello-elementor-child" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "partners", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
];

register_post_type( "partners", $args );

/**
 * Post Type: Partner PCs.
 */

$labels = [
    "name" => __( "Partner PCs", "hello-elementor-child" ),
    "singular_name" => __( "Partner PC", "hello-elementor-child" ),
    "menu_name" => __( "My Partner PCs", "hello-elementor-child" ),
    "all_items" => __( "All Partner PCs", "hello-elementor-child" ),
    "add_new" => __( "Add new", "hello-elementor-child" ),
    "add_new_item" => __( "Add new Partner PC", "hello-elementor-child" ),
    "edit_item" => __( "Edit Partner PC", "hello-elementor-child" ),
    "new_item" => __( "New Partner PC", "hello-elementor-child" ),
    "view_item" => __( "View Partner PC", "hello-elementor-child" ),
    "view_items" => __( "View Partner PCs", "hello-elementor-child" ),
    "search_items" => __( "Search Partner PCs", "hello-elementor-child" ),
    "not_found" => __( "No Partner PCs found", "hello-elementor-child" ),
    "not_found_in_trash" => __( "No Partner PCs found in trash", "hello-elementor-child" ),
    "parent" => __( "Parent Partner PC:", "hello-elementor-child" ),
    "featured_image" => __( "Featured image for this Partner PC", "hello-elementor-child" ),
    "set_featured_image" => __( "Set featured image for this Partner PC", "hello-elementor-child" ),
    "remove_featured_image" => __( "Remove featured image for this Partner PC", "hello-elementor-child" ),
    "use_featured_image" => __( "Use as featured image for this Partner PC", "hello-elementor-child" ),
    "archives" => __( "Partner PC archives", "hello-elementor-child" ),
    "insert_into_item" => __( "Insert into Partner PC", "hello-elementor-child" ),
    "uploaded_to_this_item" => __( "Upload to this Partner PC", "hello-elementor-child" ),
    "filter_items_list" => __( "Filter Partner PCs list", "hello-elementor-child" ),
    "items_list_navigation" => __( "Partner PCs list navigation", "hello-elementor-child" ),
    "items_list" => __( "Partner PCs list", "hello-elementor-child" ),
    "attributes" => __( "Partner PCs attributes", "hello-elementor-child" ),
    "name_admin_bar" => __( "Partner PC", "hello-elementor-child" ),
    "item_published" => __( "Partner PC published", "hello-elementor-child" ),
    "item_published_privately" => __( "Partner PC published privately.", "hello-elementor-child" ),
    "item_reverted_to_draft" => __( "Partner PC reverted to draft.", "hello-elementor-child" ),
    "item_scheduled" => __( "Partner PC scheduled", "hello-elementor-child" ),
    "item_updated" => __( "Partner PC updated.", "hello-elementor-child" ),
    "parent_item_colon" => __( "Parent Partner PC:", "hello-elementor-child" ),
];

$args = [
    "label" => __( "Partner PCs", "hello-elementor-child" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "partner_pc",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "partner_pc", "with_front" => true ],
    "query_var" => true,
    "menu_icon" => "dashicons-products",
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
];

register_post_type( "partner_pc", $args );
