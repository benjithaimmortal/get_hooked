<?php
/**
* Template Name: Filter Explainer Page
*/

// this is how you "hook" into an action
add_action('action_name', 'action_callback', 10, 2);
function action_callback($first_arg, $second_arg) {
  echo "<li>$first_arg</li>";
  echo "<li>$second_arg</li>";
  echo "<br>";
}
?>


<pre><code class='language-php'>// this is how WordPress and plugins [and you!], set an action to fire:
$sports = array('hockey' => 'Pens', 'football' => 'Stillers', 'baseball' => "Par'ts");
do_action('action_name', "Primanti's", 'IC Light', $sports);

/**
 * this is how you "hook" into the action.
 * requires: action name [string], callback function name [string]
 * optional: priority [integer], arguments [integer]
 */ 
add_action('action_name', 'action_callback', 10, 2);
function action_callback($first_arg, $second_arg) {
  echo "$first_arg";
  echo "$second_arg";
}
</code></pre>

<h3>Output:</h3>
<div class='example'>
  <strong>The action is called ... now!</strong>
  <ul>
    <br>
    <?php
      // this is how WordPress, plugins, and you, set an action to fire:
    $sports = array('hockey' => 'Pens', 'football' => 'Stillers', 'baseball' => "Par'ts");
      do_action('action_name', "Primanti's", 'IC Light', $sports);
    ?>
  </ul>
</div>

<pre><code class='language-php'>// real world example
add_action('wp_head', function(){
  echo '&lt;link rel="preconnect" href="https://fonts.googleapis.com"&gt;';
});
</code></pre>
