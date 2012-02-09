<?php	
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems	
	 * Below CSS belongs to Dynamic Drive CSS Library
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */
?>
<style type="text/css">
.shadow2{
box-shadow: 7px 7px 8px #818181;
-webkit-box-shadow: 7px 7px 8px #818181;
-moz-box-shadow: 7px 7px 8px #818181;
filter: progid:DXImageTransform.Microsoft.dropShadow(color=#818181, offX=7, offY=7, positive=true);
}
</style>
<?php
	$showinfo = $XBMC->RetrieveShowInfo($_GET['s']);
	$info =	$showinfo['SeriesDesc'];
	if(strlen($info) > 310)
	{
		$info = substr($showinfo['SeriesDesc'],0,strpos($showinfo['SeriesDesc'],' ',310))."...";
	}
	$divwidth = strlen($info);

echo("<div class='shadow2' style='width:757px; height:138px; padding:1px; background:white; border: 1px solid black;'>");
?> 

<?php
	echo("<img src='getimage.php?ac=sb&ri=0&id=".$showinfo['idShow']."'/>");
?>
</div>
<?php 	echo("<h3>".$showinfo['SeriesName']."</h3>");
	echo("<h4>".$info."</h4><br/>");
?>
<br/>
