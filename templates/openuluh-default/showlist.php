<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */

	$Channelflag = false;		
//	ini_set('display_errors', 'on');	
	if($_GET['c'])
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
			$shows = $XBMC->SortShowsByChannel($channel);			
?>
			<h3 class="title"><?php echo($XBMC->CountShowsByChannel($channel)); ?> Shows</h3>
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

			$shows = $XBMC->RetrieveShowList();
			?>			
						<h3 class="title"><?php echo($XBMC->CountShows()); ?> Shows</h3>			
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
                </div> <!-- /content-left-in -->

            </div> <!-- /content-left -->
