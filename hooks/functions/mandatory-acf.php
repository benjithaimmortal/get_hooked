<?php

function dates_should_always_exist( $post_id ) {
  if ($post_id == 3) {
    $almost_mandatory_field = get_field('almost_mandatory_field', $post_id);
    if (empty($almost_mandatory_field)) {
      update_field('almost_mandatory_field', date('Ymd'), $post_id);
    }
  }
}
add_action('acf/save_post', 'dates_should_always_exist', 10, 1);