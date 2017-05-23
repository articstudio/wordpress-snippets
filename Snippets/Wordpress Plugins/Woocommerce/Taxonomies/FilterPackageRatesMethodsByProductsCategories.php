<?php

/**
 * Wordpress filter that check if the category/categories are included in the cart,
 * and exclude the available method shipping that contain this category/categories them.
 * @param $available_methods Available methods of shipping
 * @return mixed Alterate available methods of shipping
 */
function filter_package_rates_methods_by_products_categories($available_methods) {

    $cart = WC()->cart->get_cart();
    $excludes = array(
        'product-category-slug-1' => array(
            'package-rate-method-1',
            'package-rate-method-2',
        ),
        'product-category-slug-2' => array(
            'package-rate-method-1',
            'package-rate-method-3',
        ),
    );

    foreach ($cart as $item) {
        $item_data = $item['data'];
        foreach ($excludes as $category_slug => $exclude_methods_slugs) {
            if (has_term($category_slug, 'product_cat', $item_data->id)) {
                foreach ($exclude_methods_slugs as $exclude_methods_slug) {
                    if (isset($available_methods[$exclude_methods_slug])) {
                        unset($available_methods[$exclude_methods_slug]);
                    }
                }
                unset($excludes[$category_slug]);
            }
        }
        if (empty($excludes)) {
            break;
        }
    }

    return $available_methods;
}

add_filter('woocommerce_package_rates', 'filter_package_rates_methods_by_products_categories', 10, 1);
