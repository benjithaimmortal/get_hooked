<?php
/**
* Template Name: No no Page
*/
?>

<h3>If you want to do something HUGE once</h3>
<div class='example'>Well, at least be smart about it!</div>
<br>
<img src='/wp-content/themes/hooks/assets/images/Dragon_Curve.gif' alt='Dragon Curve in action!'>
<br>
<pre><code class='language-php'>// don't do this:
function bad_data_science() {
  require_once(__DIR__ . '/turtle.php');
  $drogo = dragon(100, 3);
}
add_action('wp_head', 'bad_data_science');

// maybe do this?
function not_so_bad_data_science() {
  bad_data_science();
}
add_action('custom_hook_from_button', 'not_so_bad_data_science');
</code></pre>

<br><br><br>

<h3>If you want to control when something happens</h3>
<div class='example'>Hooks happen whenever they do! You won't be able to control how often they fire without something janky.</div>

<pre><code class='language-php'>// don't do this:
function bad_cron() {
  $two_weeks = 1209600;
  $args = get_option('super_cool_data', array());
  if (time() > $last_run_time + $two_weeks) {
    my_super_cool_function($args);
  }
}
add_action('wp_head', 'bad_cron');

// do this (once):
function good_cron() {
  $args = get_option('super_cool_data', array());
  my_super_cool_function($args);
}

$two_weeks = 1209600;
wp_schedule_single_event($last_run_time + $two_weeks, 'good_cron');
</code></pre>

