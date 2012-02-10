<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */

	/*
	 * TODO: Add recursive searching using path in XBMCHelper.class.php if filepath contains smb://
	 */

		require('libs/XBMCHelper.class.php');
		$XBMC = new XBMCHelper();
		$videoInformation = $XBMC->GetEpisodeInformation($_GET['e']);
		$file = $videoInformation['filePath'];
		
		$pathparts = pathinfo($file);
		$exten = $pathparts['extension'];
		switch($exten)
		{
			case 'mp4':
				break;
			default:
				if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {				
					if(file_exists("./ffmpeg-win32/bin/ffmpeg.exe"))
					{
						$command = "./ffmpeg-win32/bin/ffmpeg.exe -i $ile -vcodec mp4 -acodec aac pipe:1";
					} else {
						die("FFmpeg not in ./ffmpeg-win32/bin, Please redownload OpenUluh from SVN or from release.");
					}
				} else {
					$command = "ffmpeg -i $file -vcodec mp4 -acodec aac pipe:1";
				}
				ini_set("maximum_execution_time", "0"); /* Let's turn off the time limit for this... This isn't needed for MP4 files since those already do progressive download. This on the other hand... it encodes, buffers, spits out, rinse, lather and repeat */
				/* Credit for below code to 4poc at https://github.com/4poc/php-live-transcode/blob/master/stream.php */
				/* -- BEGIN FFmpeg Patch */								
				define('P_STDIN', 0);
				define('P_STDOUT', 1);
				define('P_STDERR', 2);					
				define('FFMPEG_PRIORITY', '15'); /* man nice */
				define('CHUNKSIZE', 500*1024); /* how many bytes should fread() read from stdout of FFmpeg? */
				$descriptor = array(
					P_STDIN =>array("pipe","r"),
					P_STDOUT => array("pipe","w"),
					P_STDERR => array("pipe","w")
				);				
				$process = proc_open("nice -n.".FFMPEG_PRIORITY." ".$command, $descriptor, $pipes);
				$stdout_size = 0;
				header("Content-Type: video/mp4");		
				if (is_resource($process)) {
					while(!feof($pipes[P_STDOUT])){
						$chunk = fread($pipes[P_STDOUT], CHUNKSIZE);
						$stdout_size += strlen($chunk);
						if ($chunk !== false && !empty($chunk)){
							echo $chunk;
							/* flush output */
							if (ob_get_length()){            
							@ob_flush();
							@flush();
							@ob_end_flush();
							}
							@ob_start();
						}
						if(connection_aborted()){
							break;
						}
					}
					fclose($pipes[P_STDOUT]);
					fwrite($pipes[P_STDIN], "q\r\n");
					fclose($pipes[P_STDIN]);
					exit;
					/* -- END FFmpeg Patch */
				}
				break;
		}
		if (isset($_SERVER['HTTP_RANGE']))  	
		{ // do it for any device that supports byte-ranges not only iPhone
			rangeDownload($file);
		}
		else {
			header("Content-Type: video/mp4");
			header("Content-Length: ".filesize($file));
			readfile($file);
		}

	function rangeDownload($file) {
		$fp = fopen($file, 'rb');
		$size = filesize($file);
		$length = $size;
		$start = 0;
		$end = $size - 1;
		header("Accept-Ranges: 0-$length");
		if(isset($_SERVER['HTTP_RANGE'])) {
			$c_start = $start;
			$c_end = $end;
			list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
			if(strpos($range, ",") !== false) {
				header("HTTP/1.1 416 Requested Range Not Satisfiable");
				header("Content-Range: bytes $start-$end/$size");
				echo("Your device or browser has sent a multi-byte content range, this is not able to be satisfied by PandoraTV. Please try your request again.");
				exit();
			}
		if($range == "-") {
			$c_start = $size - substr($range, 1);
		}
		else {
			$range = explode('-', $range);
			$c_start = $range[0];
			$c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $size;
		}

		$c_end = ($c_end > $end) ? $end : $c_end;
		if ($c_start > $c_end || $c_start > $size - 1 || $c_end >= $size) {
 
			header('HTTP/1.1 416 Requested Range Not Satisfiable');
			header("Content-Range: bytes $start-$end/$size");
			// (?) Echo some info to the client?
			exit;
		}
		$start  = $c_start;
		$end    = $c_end;
		$length = $end - $start + 1; // Calculate new content length
		fseek($fp, $start);
		header('HTTP/1.1 206 Partial Content');
	}
	// Notify the client the byte range we'll be outputting
	header("Content-Type: video/mpeg");
	header("Content-Range: bytes $start-$end/$size");
	header("Content-Length: $length");
 
	// Start buffered download
	$buffer = 1024 * 8;
	while(!feof($fp) && ($p = ftell($fp)) <= $end) {
 
		if ($p + $buffer > $end) {
 
			// In case we're only outputtin a chunk, make sure we don't
			// read past the length
			$buffer = $end - $p + 1;
		}
		set_time_limit(0); // Reset time limit for big files
		echo fread($fp, $buffer);
		flush(); // Free up memory. Otherwise large files will trigger PHP's memory limit.
	}
 
	fclose($fp);
 
}
?>
