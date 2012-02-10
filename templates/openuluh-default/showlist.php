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
		
	

	$Channelflag = false;		
//	ini_set('display_errors', 'on');	
	if(isset($_GET['c']))
	{
		$channel = urldecode($_GET['c']);
		$Channelflag = true;
	}
?>
	<div id="cols" class="box">

        <!-- Content -->
        <div id="content">

            <div id="content-left">
                <hr class="noscreen" />
                <hr class="noscreen" />

			<div id="content-left-in">
			<!-- Recent Articles -->
<?php
	switch($Channelflag)
	{
		case true:
			$showcount = $XBMC->CountShowsByChannel($channel);
			
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
			$shows = $XBMC->SortShowsByChannel($channel, $offset);
?>
			<h3 class="title"><?php echo($showcount); ?> Shows</h3>
			<?php
				foreach($shows as $k=>$v)
				{
				
				$info = $v['SeriesDesc'];
						if(strlen($info) > 210)
						{
						$info = substr($v['SeriesDesc'],0,strpos($va['SeriesDesc'],' ',210))."...";
						}
				?>			
				<!-- Article -->
			        <div class="article box">
					<div class="article-img">
						<?php echo("<img src='getimage.php?ac=sf&ri=0&id=".$v['idShow']."' width='180' height='135' alt='' />");?>
			        	</div> <!-- /article-img -->
			        	<div class="article-desc">
						<h3><?php echo("<a href='index.php?p=episodes&s=".$v['idShow']."'>".$v['SeriesName']."</a>"); ?></h3>
						<p class="info">Originally Aired: <strong><?php echo($v['airdate']);?></strong><br/>Rating: <strong><?php echo($v['rating'])?></a></strong></p>
                				<p class="nomb"><?php echo($info);?></p>
                		        </div>
                		</div> <!-- /article -->
				<?php
				}
				break;
			case false:

			$showcount = $XBMC->CountShows();
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
			$shows = $XBMC->RetrieveShowList($offset);
			?>			
						<h3 class="title"><?php echo($showcount); ?> Shows</h3>			
			<?php
			
					foreach($shows as $k=>$v)
					{
						$info = $v['SeriesDesc'];
						if(strlen($info) > 210)
						{
						$info = substr($v['SeriesDesc'],0,strpos($v['SeriesDesc'],' ',210))."...";
						}
					
					?>
						<!-- Article -->
				        <div class="article box">
						<div class="article-img">
							<?php echo("<img src='getimage.php?ac=sf&ri=0&id=".$v['idShow']."' width='180' height='135' alt='' />");?>
				        	</div> <!-- /article-img -->
				        	<div class="article-desc">
							<h3><?php echo("<a href='index.php?p=episodes&s=".$v['idShow']."'>".$v['SeriesName']."</a>"); ?></h3>
							<p class="info">Originally Aired: <strong><?php echo($v['airdate']);?></strong><br/>Rating: <strong><?php echo($v['rating'])?></a></strong></p>
        	        				<p class="nomb"><?php echo($info);?></p>
        	        		        </div>
        	        		</div> <!-- /article -->
					<?php
					}
					break;					
			
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
				echo " <a href='index.php?p=shows&pn=$x'>$x</a> ";
				} // end else
			} // end if 
		} // end for
		?></p>
		
                </div> <!-- /content-left-in -->

            </div> <!-- /content-left -->
