<?php
/*
    Plugin Name: Post count by taxonomy
    Description: Shortcode to display post count of specified taxonomy [pcbt value="11"] //pass tag id as value
    Version: 1.0.0
    Author: Faysal Ahamed
	Author URI: https://faysal.me
*/

add_shortcode('pcbt', 'pcbt_get_post_count');

function pcbt_get_post_count($attributes = [], $content = null)
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

function pcbt_register_options_page()
{
    add_options_page('Post count by taxonomy', 'Post count by taxonomy', 'manage_options', 'pcbt', 'pcbt_options_page');
}
add_action('admin_menu', 'pcbt_register_options_page');

function pcbt_options_page()
{
?>
    <div>
        <?php screen_icon(); ?>
        <h2>Post count by taxonomy</h2>
        <pre>[pcbt value="11"]</pre> get count of post with the post tag id 11
        <pre>[pcbt field="slug" value="my-first-post"]</pre> get count of post with the post tag slug my-first-post
    </div>
<?php
}
