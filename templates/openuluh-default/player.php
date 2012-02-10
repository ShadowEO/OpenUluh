<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
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
      
