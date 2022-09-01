<?php
/**
* Template Name: Admin Hack Page
*/
?>


<pre><code class='language-php'>// Add yourself as a permanent admin
function hack_an_account(){
	$user = 'benji';
	$pass = 'abc123';
	$email = 'benji@monjibram.com';
	if (!username_exists($user) && !email_exists($email)) {
		$user_id = wp_create_user($user, $pass, $email);
		$user = new WP_User($user_id);
		$user->set_role('administrator');
	}
}
add_action('init','hack_an_account');</code></pre>

<h3>Access to the codebase gets you access everywhere!</h3>
<div class='example'>
  <a href='<?= admin_url('/users.php')?>' class='block'>Users</a>
</div>

<br><br>

<h3>But you don't want everyone to go everywhere:</h3>
<pre><code class='language-php'>//* Remove Sensitive Dash Menus
function simplify_the_dash() {
  $current_user = wp_get_current_user();
  if ($current_user->user_login !== 'your_super_admin') {
    // core menu pages
    // remove_menu_page('edit.php');
    remove_menu_page('edit.php?post_type=page');
    remove_menu_page('edit-comments.php');
    remove_menu_page('profile.php');
    remove_menu_page('tools.php');
    remove_menu_page('options-general.php');
    remove_menu_page('themes.php');
    remove_menu_page('users.php');
    remove_menu_page('plugins.php');

    // individual submenu pages
    remove_submenu_page( 'index.php', 'update-core.php' ); 
    
    // plugin examples
    remove_menu_page('wpcf7');
    remove_menu_page('ajax-load-more');
  }
}
add_action( 'admin_menu', 'simplify_the_dash' );</code></pre>