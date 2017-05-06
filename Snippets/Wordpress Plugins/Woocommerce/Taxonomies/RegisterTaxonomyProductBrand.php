<?php

register_taxonomy('product_brand', array('product'), array(
    'hierarchical' => true,
    'update_count_callback' => '_wc_term_recount',
    'label' => __('Product Brands'),
    'labels' => array(
        'name' => __('Product Brands'),
        'singular_name' => __('Product Brand'),
        'menu_name' => _x('Brands', 'Admin menu name'),
        'search_items' => __('Search Product Brands'),
        'all_items' => __('All Product Brands'),
        'edit_item' => __('Edit Product Brand'),
        'update_item' => __('Update Product Brand'),
        'add_new_item' => __('Add New Product Brand'),
        'new_item_name' => __('New Product Brand Name'),
        'popular_items' => __('Popular Product Brands'),
        'separate_items_with_commas' => __('Separate Product Brands with commas'),
        'add_or_remove_items' => __('Add or remove Product Brands'),
        'choose_from_most_used' => __('Choose from the most used Product Brands'),
        'not_found' => __('No Product Brands found'),
    ),
    'show_ui' => true,
    'query_var' => true,
    'capabilities' => array(
        'manage_terms' => 'manage_product_terms',
        'edit_terms' => 'edit_product_terms',
        'delete_terms' => 'delete_product_terms',
        'assign_terms' => 'assign_product_terms',
    ),
    'rewrite' => array(
        'slug' => _x('product-brand', 'slug'),
        'with_front' => false,
        'hierarchical' => true,
    ),
        )
);
