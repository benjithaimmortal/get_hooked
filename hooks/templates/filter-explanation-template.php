<?php
/**
* Template Name: Filter Explainer Page
*/

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

<pre><code class='language-php'>// this is how you "hook" into a filter
add_filter('filter_name', 'filter_callback_earlier', 10, 2);
function filter_callback_earlier($editable_value, $argument_one) {
  echo "$editable_value";
  $editable_value = 'WordPress';
  echo "$editable_value";
  return $editable_value;
}
</code></pre>


<h3>First filter output:</h3>
<div class='example'>
  <ul>
    <!-- faked so we could spread it out! -->
    <li>wordpress</li>
    <li>WordPress</li>
  </ul>
</div>

<pre><code class='language-php'>// hooking that filter after the fact modifies its editable_value
add_filter('filter_name', 'filter_callback_later', 11, 3);
function filter_callback_later($editable_value, $argument_one, $argument_two) {
  echo "$editable_value";
  echo "$argument_two";
  // you absolutely must return $editable_value every time, or it will be lost!
  return $editable_value;
}
</code></pre>


<h3>Second filter output:</h3>
<div class='example'>
  <ul>
    <!-- faked so we could spread it out! -->
    <li>WordPress</li>
    <li>&lt;3</li>
  </ul>
</div>

<pre><code class='language-php'>// just for kicks, let's add an action to the end! 
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


<h3>Full, real output:</h3>
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