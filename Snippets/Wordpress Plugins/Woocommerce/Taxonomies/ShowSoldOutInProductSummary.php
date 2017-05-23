<?php

/**
 * Show label sold if product is not in stock in the product summary
 */
function show_sold_out_in_product_summary() {

    global $product;

    if (!$product->is_in_stock()) {
        echo '<span class="tag_soldout">' . __('SOLD OUT', 'woocommerce') . '</span>';
    }
}

add_action('woocommerce_single_product_summary', 'show_sold_out_in_product_summary', 6);
