<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Hooks!
 * @since Hooks 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<span><?php if (!is_front_page()) {?><a href='<?= get_site_url()?>'>Back Home</a> <?php }?>💜 <a href='/about'><strong>@monjibram</strong> | <strong>@HeadlessHostman</strong> | <strong>@builtbytophat</strong></a></span>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
