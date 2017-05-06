<?php

function show_branc_in_product_summary() {
    $brands = get_the_terms(get_the_ID(), 'product_brand');
    $html_item = '<a href="%1$s" title="%2$s">%2$s</a>';
    $html_wrapper = '<div class="brand-navigation">%1$s</div>';
    $output = '';
    if ($brands) {
        foreach ($brands as $brand) {
            $output .= sprintf($html_item, esc_url(get_term_link($brand)), $brand->name);
        }
        $output = sprintf($html_wrapper, $output);
    }
    echo $output;
}

add_action('woocommerce_single_product_summary', 'show_branc_in_product_summary', 11);
