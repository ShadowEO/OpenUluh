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
		
$EpisodeInfo = $XBMC->GetEpisodeInformation($_GET['e']);
$ShowInfo = $XBMC->RetrieveShowInfo($_GET['s']);
?>
<div id="tray">

        <ul class="box">
            <li><a href="index.php">Home</a></li> <!-- Active page -->
            <li><a href="index.php?p=shows">Shows Listing</a></li>
            <li id="tray-active"><a href="#">Player</a></li>
            <li><a href="#">Currently Watching: <?php echo($ShowInfo['SeriesName']." - S".$EpisodeInfo['season']."E".$EpisodeInfo['episode'].": ".$EpisodeInfo['EpisodeName']); ?></a></li>
        </ul>

    <hr class="noscreen" />
    </div> <!-- /tray -->
<br/>
<center>
	<div id="video" style="background-color:black;">
	<?php echo('<video id="myplayer" class="video-js vjs-default-skin" controls
  preload="auto" width="640" height="480" data-setup="{}" poster="./getimage.php?ac=et&ri=1&w=640&h=480&id='.$_GET['e'].'">'); ?>
		<?php
			echo("<source src='stream.php?e=".$_GET['e']."' type='video/mp4' />");
		?>
	</video>
	<br/>
	</div>
</center>
<?php
	define("no-before-footer",true);
?>
      
