<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */
?>

    <div id="tray">
	<div id="mydroplinemenu" class="droplinebar">
<ul>
<li><a href="index.php">Main</a></li>
<li><a href="#">Channels</a>
  <ul>
	<?php
	require_once('libs/XBMCHelper.class.php');
	$XBMC = new XBMCHelper(); 
	$studioArray = $XBMC->RetrieveStudioList();
	foreach($studioArray as $k=>$v)
	{
	echo("<li><a href='index.php?p=shows&c=".$v['strStudio']."'/>".$v['strStudio']."</a></li>");
	}
	?>	
  </ul>
  </li>
  <li><a href="index.php?p=shows">Shows</a>
  <ul>
	<?php
		$showsArray = $XBMC->RetrieveShowList();
		foreach($showsArray as $k=>$v)
		{
			echo("<li><a href='index.php?p=episodes&s=".$v['idShow']."'/>".$v['SeriesName']."</a></li>");
		}	
	?>
  </ul>
</div>        
    <hr class="noscreen" />
    </div> <!-- /tray --> 

