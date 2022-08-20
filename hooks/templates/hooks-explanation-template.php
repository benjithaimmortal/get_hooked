<?php
/**
* Template Name: Explainer Page
*/

// this is how you "hook" into an action
add_action('action_name', 'action_callback', 10, 2);
function action_callback($first_arg, $second_arg) {
  echo "<li>$first_arg</li>";
  echo "<li>$second_arg</li>";
  echo "<br>";
}

// this is how you "hook" into a filter
add_filter('filter_name', 'filter_callback_earlier', 10, 2);
function filter_callback_earlier($editable_value, $argument_one) {
  echo "<li>$editable_value</li>";
  $editable_value = 'WordPress';
  echo "<li>$editable_value</li>";
  echo "<br>";
  return $editable_value;
}
// hooking that filter after the fact modifies its editable_value
add_filter('filter_name', 'filter_callback_later', 11, 3);
function filter_callback_later($editable_value, $argument_one, $argument_two) {
  echo "<li>$editable_value</li>";
  echo "<li>$argument_two</li>";
  echo "<br>";
  return $editable_value;
}
// just for kicks, let's add an action to the end! editable_value is still changed
add_action('filter_name', 'filter_callback_latest', 12, 3);
function filter_callback_latest($editable_value, $argument_one, $argument_two) {
  echo "<li>$editable_value</li>";
  echo "<li>$argument_one</li>";
  echo "<li>$argument_two</li>";
  echo "<br>";
}
?>


<pre><code class='language-php'>// this is how you "hook" into an action
add_action('action_name', 'action_callback', 10, 2);
function action_callback($first_arg, $second_arg) {
  echo "$first_arg";
  echo "$second_arg";
}

// this is how WordPress, plugins, and you, set an action to fire:
do_action('action_name', "Primanti's", 'IC Light', 'Pens game');</code></pre>

<h3>Output:</h3>
<div class='example'>
  <strong>The action is called ... now!</strong>
  <ul>
    <br>
    <?php
      // this is how WordPress, plugins, and you, set an action to fire:
      do_action('action_name', "Primanti's", 'IC Light', 'Pens game');
    ?>
  </ul>
</div>


<pre><code class='language-php'>// this is how you "hook" into a filter
add_filter('filter_name', 'filter_callback_earlier', 10, 2);
function filter_callback_earlier($editable_value, $argument_one) {
  echo "$editable_value";
  $editable_value = 'WordPress';
  echo "$editable_value";
  return $editable_value;
}
// hooking that filter after the fact modifies its editable_value
add_filter('filter_name', 'filter_callback_later', 11, 3);
function filter_callback_later($editable_value, $argument_one, $argument_two) {
  echo "$editable_value";
  echo "$argument_two";
  // you absolutely must return $editable_value every time, or it will be lost!
  return $editable_value;
}
// just for kicks, let's add an action to the end! 
// highest number == lowest priority (last)
add_action('filter_name', 'filter_callback_latest', 12, 3);
function filter_callback_latest($editable_value, $argument_one, $argument_two) {
  echo "$editable_value";
  echo "$argument_one";
  echo "$argument_two";
  // no need to add a return, this isn't filtering anything
}

// call those filters like this.
apply_filters('filter_name', 'wordpress', 'Jamstack', '&lt;3');</code></pre>


<h3>Output:</h3>
<div class='example'>
  <strong>The filter is called ... now!</strong>
  <ul>
    <br>
    <?php
      // call those filters like this
      apply_filters('filter_name', 'wordpress', 'Jamstack', '&lt;3');
    ?>
  </ul>
</div>


<h2>Three crucial helper links:</h2>
<div class='example'>
  <a href='http://rachievee.com/the-wordpress-hooks-firing-sequence/' class='block'>Rachel Vasquez</a>
  <a href='https://adambrown.info/p/wp_hooks' class='block'>Adam R. Brown</a>
  <a href='https://developer.wordpress.org/reference/hooks/' class='block'>WordPress Reference</a>
</div>