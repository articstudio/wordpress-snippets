<?php

/**
 * WordPress filter that alters the main query to sort the search results by a metavalue
 * @param $query wordpress main query
 * @return mixed alterate wordpress main query
 */
function order_search_results_by_meta($query) {
    if ($query->is_search() && (!is_admin() || DOING_AJAX)) {
        $query->set('meta_key', 'meta-key-used-to-order_results');
        $query->set('orderby', array(
            'meta_value' => 'DESC',
            'date' => 'DESC')
        );
    }
    return $query;
}

add_filter('pre_get_posts', 'order_search_results_by_meta');
