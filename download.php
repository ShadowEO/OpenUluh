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
	

	require('libs/XBMCHelper.class.php');
		$XBMC = new XBMCHelper();
		$videoInformation = $XBMC->GetEpisodeInformation($_GET['e']);
		ini_set("max_execution_time", "0");
		$file = $videoInformation['filePath'];
		$streampath = parse_url($file);
		if(isset($streampath['scheme']) && $streampath['scheme'] == "smb://")
		{
			// We found that the filepath includes smb://, by this we have determined a 
			// Synchronized XBMC installation and substitute direct paths for searching for the file
			// In the library.
			$di = new RecursiveDirectoryIterator($XBMC->XBMCTVLibraryPath);
			foreach(new RecursiveIteratorIterator($di) as $filename=>$cur)
			{
				if($cur->getFilename() == $videoInformation['filename'])
				{
					$file = $filename;
					break;
				}
			}
		}

		$length = filesize($file);
		$pathparts = pathinfo($file);
		$exten = $pathparts['extension'];
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file)).' GMT');
		header('Cache-Control: private',false);
		$newfilename = $videoInformation['SeriesName']."-S".$videoInformation['season']."E".$videoInformation['episode'].".".$exten;
		header('Content-Disposition: attachment; filename="'.$newfilename.'"');
		header("Content-Transfer-Encoding: binary");
		header("Content-Type: application/octet-stream");		
		header("Content-Length: $length");
		header("Connection: close");
		readfile($file);

?>
		
	
