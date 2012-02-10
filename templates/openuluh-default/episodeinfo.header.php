<?php
	/*
	 * OpenUluh
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
