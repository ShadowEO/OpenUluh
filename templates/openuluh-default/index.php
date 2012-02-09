<?php	
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */
	ini_set('display_errors','on');
?>
    <div id="cols" class="box">

        <!-- Content -->
        <div id="content">

            <div id="content-left">

		<?php
		$Shows = $XBMC->RetrieveShowList();
		$randshows = shuffle($Shows);
		$topstory = 0;
		$storybox = 0;
		foreach($Shows as $k=>$v)
		{
		$justtopstoried = false;
		$info = $v['SeriesDesc'];
		if(strlen($info) > 310)
		{
		$info = substr($v['SeriesDesc'],0,strpos($v['SeriesDesc'],' ',210))."...";
		}
		$divwidth = strlen($info);
		if($topstory != 1)
			{
			?>                
			<!-- Topstory -->
	                <div id="topstory-top"></div>
	                <div id="topstory" class="box">
	                
	                    <div id="topstory-img"><?php echo("<img src='getimage.php?ac=sf&ri=0&id=".$v['idShow']."' width='180' height='135' alt='' />"); ?></div>
	                    
	                    <div id="topstory-desc">
	
	                        <?php echo("<h2><a href='index.php?p=episodes&s=".$v['idShow']."'>".$v['SeriesName']);?></a></h2>
	                        <p class="info">Channel: <strong><?php echo($v['channel']);?></strong><br/>Rating: <strong>&nbsp;&nbsp;<?php echo($v['rating']);?></strong></p>
	                        <p class="nomb"><?php echo($info); ?></p>
	
	                    </div> <!-- /topstory-desc -->
	                
	                </div> <!-- /topstory -->
			<div id="topstory-list" class="box">
			<?php
			$topstory++;
			$justtopstoried = true;
		}
		if($storybox != 4)
		{
			if($justtopstoried == false)
			{
				?>
				                    <p class="nom">
	                        <?php echo("<a href='index.php?p=episodes&s=".$v['idShow']."'><img src='getimage.php?ac=sf&ri=0&id=".$v['idShow']."' width='105' height='75' alt='' /></a>"); ?>
		                </p>
	
				<?php
				$storybox++;
			}			
			?>	
		<?php

			}
		}
		?>
                </div> <!-- /topstory-list -->
                <div id="topstory-bottom"></div>

                <hr class="noscreen" />
                <div id="content-left-in">

                    <!-- Recent Articles -->
                    <h3 class="title">Random Episodes</h3>
			<?php
			$Shows2 = $XBMC->RetrieveShowList();
			$randshows = shuffle($Shows);			
			$showcount = 0;			
			foreach($Shows2 as $k=>$v)
			{
				if($showcount != 5){				
				$Episodes = $XBMC->RetrieveEpisodesforShow($v['idShow']);
				shuffle($Episodes);
				$episodes = 0;
				foreach($Episodes as $e=>$va)
				{
					$EpisodeInfo = $XBMC->GetEpisodeInformation($va['idEpisode']);
					if($episodes != 1)
					{					
						$info = $va['EpisodeDesc'];
						if(strlen($info) > 310)
						{
						$info = substr($va['EpisodeDesc'],0,strpos($va['EpisodeDesc'],' ',210))."...";
						}
					
					?>
					<!-- Article -->
			                <div class="article box">
        	                		<div class="article-img">
        		                		<?php echo("<img src='getimage.php?ac=et&ri=0&id=".$va['idEpisode']."' width='180' height='135' alt='' />"); ?>
		                       		</div> <!-- /article-img -->
        	                		<div class="article-desc">
		                        		<?php echo("<h3><a href='index.php?p=player&s=".$v['idShow']."&e=".$va['idEpisode']."'>".$va['EpisodeName']."</a></h3>"); ?>
							<p class="info">Originally Aired: <strong><?php echo($va['airdate']);?></strong> on: <strong><?php echo("<a href='index.php?p=shows&c=".$v['channel']."'>".$v['channel']."</a></strong></p>");?>
							<p class="nomb"><?php echo($info); ?></p>
			                        </div>
        				</div> <!-- /article -->
					<?php
					$episodes++;
					} else {
						break;
					}
				}
				$showcount++;
			}
			}
			?>
			<p class="t-right"><a href="index.php?p=shows" class="more">More Shows</a></p>
                </div> <!-- /content-left-in -->

            </div> <!-- /content-left -->

<!--        <hr class="noscreen" />
        </div> <!-- /content -->


