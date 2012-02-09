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
<center>
	<div id="video" style="background-color:black;">
	<?php echo('<video id="myplayer" class="video-js vjs-default-skin" controls
  preload="auto" width="640" height="480" data-setup="{}" poster="./getimage.php?ac=et&ri=1&w=640&h=480&id='.$_GET['e'].'">'); ?>
		<?php
			echo("<source src='stream.php?e=".$_GET['e']."' type='video/mp4' />");
		?>
	</video>
	<br/>s	
	</div>
</center>
