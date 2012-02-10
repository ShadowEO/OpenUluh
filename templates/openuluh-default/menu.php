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

