<?php
/**
 * Enqueue scripts and styles.
 *
 * @since Hooks! 1.0
 *
 * @return void
 */
function hooks_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	// global $is_IE, $wp_scripts;
	// if ( $is_IE ) {
	// 	// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
	// 	// wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	// } else {
	// If not IE, use the standard stylesheet.
	wp_enqueue_style(
		'base_stylesheet',
		get_template_directory_uri() . '/style.css',
		array(),
		filemtime(get_template_directory() . '/style.css'),
		false
	);

	/**
	 * Highlight JS for all my custom code blocks
	 */
	wp_enqueue_style(
		'highlight_stylesheet',
		'//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css',
	);
	wp_enqueue_script(
		'highlight_library',
		'//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js',
	);
	wp_enqueue_script(
		'highlight_initializer',
		get_template_directory_uri() . '/scripts/highlight.js',
		array(),
		filemtime( get_template_directory() . '/scripts/highlight.js'),
		false
	);
}
add_action( 'wp_enqueue_scripts', 'hooks_scripts' );



/* ## 	Wrap Template Content with
		our custom header and footer.
--------------------------------------------- */
add_filter( 'template_include', function( $template ) {
	get_header();
	include $template;
	get_footer();
	return FALSE;
});