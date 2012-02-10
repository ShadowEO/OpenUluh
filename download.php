<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */
	
	/* TODO: Filename support and path substitution on Samba Shares */

	/* PROPOSED: merge to stream.php */
	
	header("Content-Type: application/octet-stream");
	require('libs/XBMCHelper.class.php');
		$XBMC = new XBMCHelper();
		$videoInformation = $XBMC->GetEpisodeInformation($_GET['e']);
		$file = $videoInformation['filePath'];
		ini_set("max_execution_time", "0");
		$length = filesize($file);
		header("Content-Filename: test.mp4".$videoInformation['filename']);
		header("Content-Length: $length");
		readfile($file);

?>
		
	
