<?php
/**
* Template Name: Almost-Mandatory Field Page
*/
?>

<h3 class='date'>Your date field is currently: <u>&nbsp;<strong><?= strlen(get_field('almost_mandatory_field')) ? get_field('almost_mandatory_field') : '[blank]'?></strong>&nbsp;</u></h3>