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
		
	
