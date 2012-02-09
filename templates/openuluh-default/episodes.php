<div id="cols" class="box">

        <!-- Content -->
        <div id="content">

            <div id="content-left">

	
<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */
	$EpisodesArray = $XBMC->RetrieveEpisodesForShow($_GET['s']);
	$ShowInfo = $XBMC->RetrieveShowInfo($_GET['s']);
	$info = $ShowInfo['SeriesDesc'];
	if(strlen($info) > 210)
	{
		$info = substr($ShowInfo['SeriesDesc'],0,strpos($ShowInfo['SeriesDesc'],' ',210))."...";
	}
	?>
				<!-- Topstory -->
	                <div id="topstory-top"></div>
	                <div id="topstory" class="box">
	                
	                    <div id="topstory-img"><?php echo("<img src='getimage.php?ac=sf&ri=0&id=".$ShowInfo['idShow']."' width='180' height='135' alt='' />"); ?></div>
	                    
	                    <div id="topstory-desc">
	
	                        <?php echo("<h2>".$ShowInfo['SeriesName']);?></h2>
	                        <p class="info">Channel: <strong><?php echo($ShowInfo['channel']);?></strong><br/>Rating: <strong>&nbsp;&nbsp;<?php echo($ShowInfo['rating']);?></strong><br/>Date: <strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo($ShowInfo['airdate']);?></strong></p>
	                        <p class="nomb"><?php echo($info); ?></p>
	
	                    </div> <!-- /topstory-desc -->
	                
	                </div> <!-- /topstory -->

		    <hr class="noscreen" />
	                <div id="content-left-in">
	
<?php
	if(is_array($EpisodesArray))
	{
?>
	                    <!-- Recent Articles -->
            	        <h3 class="title"><?php echo($XBMC->CountEpisodes($ShowInfo['idShow'])); ?> Episodes</h3>
<?php
		foreach($EpisodesArray as $k=>$v)
		{
		if(strlen($v['EpisodeDesc']) > 120)
		{
			$v['EpisodeDesc'] = substr($v['EpisodeDesc'],0,strpos($v['EpisodeDesc'],' ',120))."...";
		}
		?>					
				<!-- Article -->
			                <div class="article box">
        	                		<div class="article-img">
        		                		<?php echo("<img src='getimage.php?ac=et&ri=0&id=".$v['idEpisode']."' width='180' height='135' alt='' />"); ?>
		                       		</div> <!-- /article-img -->
        	                		<div class="article-desc">
		                        		<?php echo("<h3><a href='index.php?p=player&s=".$_GET['s']."&e=".$v['idEpisode']."'>".$v['EpisodeName']."</a></h3>"); ?>
							<p class="info">Originally Aired: <strong><?php echo($v['airdate']);?></strong> on: <strong><?php echo("<a href='index.php?p=shows&c=".$v['channel']."'>".$v['channel']."</a></strong>");?><br/>Episode: <strong>S<?php echo($v['season']."E".$v['episode']); ?></p>
							<p class="nomb"><?php echo($info); ?></p>
			                        </div>
        				</div> <!-- /article -->		
		<?php
		}
		
	} else {
		echo("<div class='article box'><center><h2>There are no episodes for this show yet. Probably still downloading..</h2></center></div>");
	}
?>
                </div> <!-- /content-left-in -->

            </div> <!-- /content-left -->


