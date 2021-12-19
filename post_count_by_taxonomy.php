<?php
/*
    Plugin Name: Post count by taxonomy
    Description: Shortcode to display post count of specified taxonomy
    Version: 1.0.0
    Author: Faysal Ahamed
	Author URI: https://faysal.me
*/

add_shortcode('post_count_by_taxonomy', 'post_count_by_taxonomy');

function post_count_by_taxonomy($attributes = [], $content = null)
{
    $attributes = shortcode_atts(
        array(
            'field' => 'id',
            'value' => null,
            'tax'   => 'post_tag'
        ),
        $attributes
    );
    $field = $attributes['field'];
    $value = $attributes['value'];
    $taxonomy = $attributes['tax'];
    
    $term = get_term_by($field, $value, $taxonomy);
    return  $term->count;
}