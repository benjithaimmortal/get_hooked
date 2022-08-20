<?php
/**
* Template Name: Almost-Mandatory Field Page
*/
?>


<pre><code class='language-php'>function dates_should_always_exist( $post_id ) {
  if (get_post_type($post_id) == 'posts') {
    $sorta_mandatory_field = get_field('sorta_mandatory_field', $post_id);
    if (empty($sorta_mandatory_field)) {
      update_field('sorta_mandatory_field', date('Ymd'), $post_id);
    }
  }
}
add_action('acf/save_post', 'dates_should_always_exist', 10, 1);</code></pre>


<h3><a href='<?= admin_url('post.php?post=3&action=edit')?>'>Check aht that field!</a></h3>
<div class='example'>Your date field is currently: <u>&nbsp;<strong><?= strlen(get_field('almost_mandatory_field')) ? get_field('almost_mandatory_field') : '[blank]'?></strong>&nbsp;</u></div>