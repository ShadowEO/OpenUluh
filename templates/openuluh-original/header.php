<!DOCTYPE html>
<head>
<?php	
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * Below CSS belongs to Dynamic Drive CSS Library
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */
?>
<?php include("config/application.php"); ?>
<?php echo("<title>".$config['AppTitle']."</title>"); ?>

<link rel="stylesheet" type="text/css" href="droplinebar.css" />
<script type="text/javascript" src="jquery/jquery-min.js"></script>
<style type="text/css">
video {
	background-color:black;
}
</style>

<script src="droplinemenu.js" type="text/javascript"></script>

<script type="text/javascript">

//build menu with DIV ID="myslidemenu" on page:
droplinemenu.buildmenu("mydroplinemenu");

</script>
<?php
	if($_GET['p'] == "player")
{
?>
  <link href="video-js.css" rel="stylesheet" type="text/css">

  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="video.js"></script>
<?php
}
?>
</head>

