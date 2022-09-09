# Hi there! You're learning about WordPress hooks

Welcome! Make yourself at home; browse around.


## The links from the end of this talk are also here:
  - [Rachel Vasquez](http://rachievee.com/the-wordpress-hooks-firing-sequence/)
  - [Adam R. Brown](https://adambrown.info/p/wp_hooks)
  - []

  - [Full Hook List](https://developer.wordpress.org/reference/hooks/)
  - [Plugin API Reference (for Admin requests)](https://codex.wordpress.org/Plugin_API/Action_Reference/#Actions_Run_During_an_Admin_Page_Request)
  - [Action Reference](https://codex.wordpress.org/Plugin_API/Action_Reference/) and [Filter Reference](https://codex.wordpress.org/Plugin_API/Filter_Reference)



## What's this theme about?

It's a really simple implementation to show off WordPress hook actions and filters.

The `functions/` directory contains files that are linked in `functions.php`

The `scripts/` directory contains scripts that are enqueued in WordPress.

The `templates/` directory contains my custom page templates, for demoing the functionality and showing my code during the conference.

Sometimes you'll need a plugin to make this theme work as expected. I installed:
  - [Advanced Custom Fields [paid]](https://advancedcustomfields.com/)
  - [Ajax Load More [free]](https://connekthq.com/plugins/ajax-load-more/)
  - _and nothing else_


## To install this theme
  1. Move or (preferably) *clone* this folder into the `wp-content/themes/` folder of your active WordPress install.
  2. Activate the theme within the WordPress backend.
  3. Make a whole slew of pages for the various page templates.
  4. Install the recommended plugins (ACF and ALM)
  5. Accept my apologies, as I've hard linked the homepage template to post IDs :( but you can edit them at will!
  6. Go make something awesome!
