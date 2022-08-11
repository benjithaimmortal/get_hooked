<?php
/**
* Template Name: ALM Filtered
*/

?>

<pre><code class='language-php'>function first_sort_featured( $args, $id ){
  // ALM uses these, no touchy touchy!
  // $args['posts_per_page'] = -1;
  // $args['offset'] = 0;
  // $args['post_type'] = 'posts';

  // ALM should default this. But it's an example of how we're setting variables
  $args['post_status'] = 'publish';

  if (!isset($args['orderby'])) {
    // no order? set it and forget it
    $args['orderby'] = array('first_sort_featured' => 'DESC');
  } elseif (!isset($args['orderby']['first_sort_featured'])) {
    // check if it's set at all. skip if it is.
    if (is_array($args['orderby'])) {
      // if there's already an array, put this FIRST
      $args['orderby'] = array_unshift($args['orderby'], array('first_sort_featured' => 'DESC'));
    } else {
      // ALM likes to use the simple formatting for its defaults and shortcodes.
      // if it's not already an array, make it one.
      // put our featured key first.
      $args['orderby'] = array(
        'first_sort_featured' => 'DESC',
        $args['orderby'] => ($args['orderby'] == 'post_title' ? 'ASC' : 'DESC')
      );
    }
  }
  return $args;
}
add_filter( 'alm_query_args_custom_alm', 'first_sort_featured', 10, 2);</code></pre>

<h2>Results: [<a href='?sort'>Use the Filter</a>]</h2>
<?php
$shortcode = isset($_GET['sort']) ? '[ajax_load_more post_type="post" id="custom_alm" posts_per_page="2" order="ASC"]' : '[ajax_load_more post_type="post" posts_per_page="2" order="ASC"]';
echo do_shortcode($shortcode); ?>