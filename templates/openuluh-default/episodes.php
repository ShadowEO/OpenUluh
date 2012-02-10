<div id="cols" class="box">

        <!-- Content -->
        <div id="content">

            <div id="content-left">

	
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
		
	$ShowInfo = $XBMC->RetrieveShowInfo($_GET['s']);
	$info = $ShowInfo['SeriesDesc'];
	$showcount = $XBMC->CountEpisodes($ShowInfo['idShow']);
	$totalpages = ceil($showcount / $XBMC->pagination_perpage);
	if(isset($_GET['pn']) && is_numeric($_GET['pn']))
	{
		$currentpage = (int) $_GET['pn'];
		if($currentpage > $totalpages)
		{
			$currentpage = $totalpages;
		}
		if($currentpage < 1)
		{
			$currentpage = 1;
		}
	} else {
		$currentpage = 1;	
	}
		$offset = ($currentpage - 1) * $XBMC->pagination_perpage;		
		if(!$offset)
		{
			$offset = "0";
		}
		$EpisodesArray = $XBMC->RetrieveEpisodesForShow($_GET['s'], $offset);
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
            	        <h3 class="title"><?php echo($showcount); ?> Episodes</h3>
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
		?>
		<p class="t-right"><?php
		$range = 4;
		for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++)
		{
			if (($x > 0) && ($x <= $totalpages)) {
				// if we're on current page...
				if ($x == $currentpage) {
				// 'highlight' it but don't make a link
				echo " [<b>$x</b>] ";
				// if not current page...
				} else {
				// make it a link
				echo " <a href='index.php?p=episodes&s=".$_GET['s']."&pn=$x'>$x</a> ";
				} // end else
			} // end if 
		} // end for
		?></p><?php
	} else {
		echo("<div class='article box'><center><h2>There are no episodes for this show yet. Probably still downloading..</h2></center></div>");
	}
?>
                </div> <!-- /content-left-in -->

            </div> <!-- /content-left -->


