<?php
echo("<?xml version='1.0'?>");
?>
<?php	
	/*
	 * OpenUluh
	 *
	 * Website Layout and CSS belongs to Nuvio [www.nuvio.cz]
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems <dreamcaster23@gmail.com>
	 * GPG Key ID: AC5EEA2B
	 *
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
 	 * the Free Software Foundation, either version 3 of the License, or
 	 * (at your option) any later version.
 	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 * 
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="robots" content="all,follow" />

    <meta name="author" lang="en" content="ShadowEO" />
    <meta name="copyright" lang="en" content="Webdesign: Nuvio [www.nuvio.cz]; e-mail: ahoj@nuvio.cz" />

    <meta name="description" content="..." />
    <meta name="keywords" content="..." />

    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/switcher.css" />
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="print" type="text/css" href="css/print.css" />

    <script type="text/javascript" src="js/switcher.js"></script>
    <link rel="stylesheet" media="screen,projection" type="text/css" href="styles/01/css/style.css" title="01" />
    <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="styles/02/css/style.css" title="02" />
    <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="styles/03/css/style.css" title="03" />
    <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="styles/04/css/style.css" title="04" />
    <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="styles/05/css/style.css" title="05" />
    <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="styles/06/css/style.css" title="06" />
    <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="styles/07/css/style.css" title="07" />
    <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="styles/08/css/style.css" title="08" />
	<link rel="stylesheet" type="text/css" href="droplinebar.css" />
	<script type="text/javascript" src="jquery/jquery-min.js"></script>
	<style type="text/css">
	video {
		background-color:black;
	}
	</style>
<?php
	if($page == "player")
{
?>
  <link href="video-js.css" rel="stylesheet" type="text/css">

  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="video.js"></script>
<?php
}
?>

<script src="droplinemenu.js" type="text/javascript"></script>

<script type="text/javascript">

//build menu with DIV ID="myslidemenu" on page:
droplinemenu.buildmenu("mydroplinemenu");

</script>

    <title>OpenUluh - Personal TV Streaming</title>
</head>

<body>
<div id="main">

    <!-- Header -->
    <div id="header">

        <h1 id="logo"><a href="./" title="[Go to homepage]"><span></span></a></h1>
        <hr class="noscreen" />          

        <!-- Color switcher -->
        <p id="switcher">
            <a href="#" onclick="setActiveStyleSheet('06'); return false;"><img src="images/06.gif" width="10" height="10" alt="" /></a>
            <a href="#" onclick="setActiveStyleSheet('01'); return false;"><img src="images/01.gif" width="10" height="10" alt="" /></a>
            <a href="#" onclick="setActiveStyleSheet('08'); return false;"><img src="images/08.gif" width="10" height="10" alt="" /></a>
            <a href="#" onclick="setActiveStyleSheet('04'); return false;"><img src="images/04.gif" width="10" height="10" alt="" /></a>
            <a href="#" onclick="setActiveStyleSheet('02'); return false;"><img src="images/02.gif" width="10" height="10" alt="" /></a>
            <a href="#" onclick="setActiveStyleSheet('05'); return false;"><img src="images/05.gif" width="10" height="10" alt="" /></a>
            <a href="#" onclick="setActiveStyleSheet('07'); return false;"><img src="images/07.gif" width="10" height="10" alt="" /></a>
            <a href="#" onclick="setActiveStyleSheet('03'); return false;"><img src="images/03.gif" width="10" height="10" alt="" /></a>
        </p>

    </div> <!-- /header -->
    


