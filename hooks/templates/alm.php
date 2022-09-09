<?php
/**
* Template Name: ALM Filtered
*/

?>
<br><br>
<h2>Results: [<a href='?sort'>Use the Filter</a>]</h2>
<?php
$shortcode = isset($_GET['sort']) ? '[ajax_load_more post_type="post" id="custom_alm" posts_per_page="2"]' : '[ajax_load_more post_type="post" posts_per_page="2"]';
echo do_shortcode($shortcode); ?>
<br><br>
<pre><code class='language-php'>add_filter( 'alm_query_args_custom_alm', 'first_sort_featured', 10, 2);
/**
 * where the shortcode has an ID "custom_alm": 
 * [ajax_load_more post_type="post" id="custom_alm" posts_per_page="2"]
 */


function first_sort_featured( $args, $id ){
  /**
   * ALM uses these defaults, no touchy touchy!
   * $args['posts_per_page'] = -1;
   * $args['offset'] = 0;
   * $args['post_type'] = 'posts';
   */
  
  // ALM should default this. But it's an example of how we're setting variables
  $args['post_status'] = 'publish';
  
  /**
   * Label your meta query but DON'T GIVE IT A VALUE.
   * You're not filtering posts by this.
   * ... but be sure every thing you're passing has this meta key!
   *  */
  $args['meta_query']['first_sort_featured'] = array(
    'key' => 'featured',
  );


  /**
   * This is what a WP_Query orderby array often looks like (when it's an array):
   * $args['orderby'] = array(
   *   'first_meta_key_or_name' => 'direction',
   *   'second_meta_key_or_name' => 'direction',
   * );
   */


  // no order? set it and forget it
  if (!isset($args['orderby'])) {
    $args['orderby'] = array('first_sort_featured' => 'DESC');

  // check if it's set at all. skip everything if it is.
  } elseif (!isset($args['orderby']['first_sort_featured'])) {
    
    // if there's already an array, put this FIRST
    if (is_array($args['orderby'])) {
      $args['orderby'] = array_unshift($args['orderby'], array('first_sort_featured' => 'DESC'));

    /**
     * ALM likes to use the array key shortcut for its defaults and shortcodes.
     * If orderby is not an array, we make it an one with our featured key first.
     */
    } else {
      $args['orderby'] = array(
        'first_sort_featured' => 'DESC',
        $args['orderby'] => ($args['orderby'] == 'post_title' ? 'ASC' : 'DESC')
      );
    }
  }

  // ALWAYS...
  return $args;
}
</code></pre>