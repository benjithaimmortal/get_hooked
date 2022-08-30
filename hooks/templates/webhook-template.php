<?php
/**
* Template Name: Webhook Page
*/
?>


<pre><code class='language-php'>function webhook_new_data_type($post_ID, $post, $update) {
  // only want to fire this on new post saves? uncomment this
  // if ($update) return;

  $new_meta = $post->custom_post_meta_key;

  // cURL session
  $ch = curl_init($external_data_archive_url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: ' . $external_data_archive_api_key,));
  
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    $post_ID => $new_meta
  ));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
  $response = curl_exec($ch);
  curl_close($ch);
}
add_action('save_post_data_type', 'webhook_new_data_type', 10, 3)
</code></pre>