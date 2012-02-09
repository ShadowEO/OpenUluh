<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * Below CSS belongs to DynamicDrive's CSS Library
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
	$showinfo = $XBMC->GetEpisodeInformation($_GET['e']);
	$info =	$showinfo['EpisodeDesc'];
	if(strlen($info) > 310)
	{
		$info = substr($showinfo['EpisodeDesc'],0,strpos($showinfo['EpisodeDesc'],' ',310))."...";
	}
	$divwidth = strlen($info);

echo("<div class='shadow2' style='width:757px; height:138px; padding:1px; background:white; border: 1px solid black;'>");
?> 


<?php

	echo("<img src='./getimage.php?ac=sb&ri=0&id=".$showinfo['seriesid']."'/>");
	
	
?>
</div>
<hr/>
