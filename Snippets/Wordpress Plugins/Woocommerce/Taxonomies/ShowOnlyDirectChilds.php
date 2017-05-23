<?php

/**
 * Wordpress hook to alter main query, to display only children direct from a taxonomy
 * @param $query Main query
 */
function show_only_direct_childs_on_tax($query) {
    if ($query->is_main_query() && !is_admin()) {
        $tax_query = $query->tax_query;
        foreach ($tax_query->queries as $k => $v) {
            if (is_array($v) && isset($v['include_children']) && $v['include_children']) {
                $tax_query->queries[$k]['include_children'] = false;
            }
        }
        $query->tax_query = $tax_query;
    }
}

add_action('parse_tax_query', 'show_only_direct_childs_on_tax');
