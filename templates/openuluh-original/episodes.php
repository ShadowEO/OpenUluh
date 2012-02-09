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
		
	if(is_array($EpisodesArray))
	{
?>

<table style="border: none;">
<tr>
<th>Season, Episode</th>
<th>Episode Name</th>
<th>Episode Description</th>
<th>Episode Aired</th>
</tr>

<?php
		foreach($EpisodesArray as $k=>$v)
		{
		echo("<tr>");
		echo("<td><center>".$v['season'].", ".$v['episode']."</center></td>");
		echo("<td><a href='index.php?p=player&s=".$_GET['s']."&e=".$v['idEpisode']."'>".$v['EpisodeName']."</a></td>");
		if(strlen($v['EpisodeDesc']) > 120)
		{
			$v['EpisodeDesc'] = substr($v['EpisodeDesc'],0,strpos($v['EpisodeDesc'],' ',120))."...";
		}
		echo("<td>".$v['EpisodeDesc']."</td>");
		echo("<td>".$v['airdate']."</td>");
		echo("</tr>");
		}
	} else {
		echo("<center><h2>There are no episodes for this show yet. Probably still downloading..</h2></center>");
	}
?>
</table>

