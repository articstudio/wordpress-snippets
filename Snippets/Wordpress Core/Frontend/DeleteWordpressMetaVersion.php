<?php

add_filter('the_generator', '__return_false');
remove_action('wp_head', 'wp_generator');
