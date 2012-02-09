<?php	
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */
?>
<h2>Welcome to <?php echo($config['AppTitle']); ?></h2>

<br/>
<br/>
<h3>Random Shows</h3>
<center>
<table borders=0>

	
<?php
$Shows = $XBMC->RetrieveShowList();
$randshows = shuffle($Shows);
				$columns = 0;
				$items = 0;
			foreach($Shows as $k=>$v)
			{
				if($items == 4)
				{
					break;
				}
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
				$items++;
			}
?>
</table>
</center>

