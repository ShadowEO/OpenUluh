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
//	ini_set('display_errors', 'off');	
	if($_GET['c'])
	{
		$channel = urldecode($_GET['c']);
		echo("<h3>".$channel."</h3>");
		echo("<h4>".$XBMC->CountShowsByChannel($channel)." Shows</h4>");
		$Channelflag = true;
	} else {
		echo("<h3>All Shows</h3>");
		echo("<h4>".$XBMC->CountShows()." Shows</h4>");
	}

	switch($Channelflag)
	{
		case true:
			$shows = $XBMC->SortShowsByChannel($channel);
?>
<table borders="0">
<tr>
<?php
			$columns = 0;
			foreach($shows as $k=>$v)
			{
				if($columns != 2)
				{
					echo("<td><a href='index.php?p=episodes&s=".$v['idShow']."'><img src='getimage.php?ac=sb&ri=1&w=600&h=600&id=".$v['idShow']."'/></a>");
				$columns++;
				} else {
					$tableend = 0;
					echo("</tr>");
					echo("<tr>");
					echo("<td><a href='index.php?p=episodes&s=".$v['idShow']."'><img src='getimage.php?ac=sb&ri=1&w=600&h=600&id=".$v['idShow']."'/></a>");
					$columns = 1;
					$tableend = 1;
				}
			}
?>
</table>
<?php
			break;
		case false:
			$shows = $XBMC->RetrieveShowList();
?>
<table borders="0">
<tr>
<?php
			$columns = 0;
			foreach($shows as $k=>$v)
			{
				if($columns != 2)
				{
					echo("<td><a href='index.php?p=episodes&s=".$v['idShow']."'><img src='getimage.php?ac=sb&ri=1&w=600&h=600&id=".$v['idShow']."'/></a>");
				$columns++;
				} else {
					$tableend = 0;
					echo("</tr>");
					echo("<tr>");
					echo("<td><a href='index.php?p=episodes&s=".$v['idShow']."'><img src='getimage.php?ac=sb&ri=1&w=600&h=600&id=".$v['idShow']."'/></a>");
					$columns = 1;
					$tableend = 1;
				}
			}
?>
</table>
<?php
			break;
	}
?>

