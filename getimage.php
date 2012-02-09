<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * _get_hash() Belongs to the XBMC Developers Team
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */
	include("libs/XBMCHelper.class.php");
	$XBMC = new XBMCHelper();
 function _get_hash($file_path)
  {
    $chars = strtolower($file_path);
    $crc = 0xffffffff;

    for ($ptr = 0; $ptr < strlen($chars); $ptr++)
    {
      $chr = ord($chars[$ptr]);
      $crc ^= $chr << 24;

      for ((int) $i = 0; $i < 8; $i++)
      {
        if ($crc & 0x80000000)
        {
          $crc = ($crc << 1) ^ 0x04C11DB7;
        }
        else
        {
          $crc <<= 1;
        }
      }
    }

    // Système d'exploitation en 64 bits ?
    if (strpos(php_uname('m'), '_64') !== false)
    {

			//Formatting the output in a 8 character hex
			if ($crc>=0)
			{
				$hash = sprintf("%16s",sprintf("%x",sprintf("%u",$crc)));
			}
			else
			{
				$source = sprintf('%b', $crc);

				$hash = "";
				while ($source <> "")
				{
					$digit = substr($source, -4);
					$hash = dechex(bindec($digit)) . $hash;
					$source = substr($source, 0, -4);
				}
			}
			$hash = substr($hash, 8);
    }
    else
    {
			//Formatting the output in a 8 character hex
			if ($crc>=0)
			{
				$hash = sprintf("%08s",sprintf("%x",sprintf("%u",$crc)));
			}
			else
			{
				$source = sprintf('%b', $crc);

				$hash = "";
				while ($source <> "")
				{
					$digit = substr($source, -4);
					$hash = dechex(bindec($digit)) . $hash;
					$source = substr($source, 0, -4);
				}
			}
    }

    return $hash;
}

function resizeImage($originalImage,$toWidth,$toHeight){ 
 
//Gettheoriginalgeometryandcalculatescales 
list($width,$height)=getimagesize($originalImage); 
$xscale=$width/$toWidth; 
$yscale=$height/$toHeight; 
 
//Recalculatenewsizewithdefaultratio 
if($yscale>$xscale){ 
$new_width=round($width*(1/$yscale)); 
$new_height=round($height*(1/$yscale)); 
} 
else{ 
$new_width=round($width*(1/$xscale)); 
$new_height=round($height*(1/$xscale)); 
} 

//Resizetheoriginalimage 
$imageResized=imagecreatetruecolor($new_width,$new_height); 
$imageTmp=imagecreatefromjpeg($originalImage); 
imagecopyresampled($imageResized,$imageTmp,0,0,0,0,$new_width,$new_height,$width,$height);

	return imagejpeg($imageResized); 
} 
header("Content-Type: image/jpeg");
ini_set("display_errors","off");
switch($_GET['ac'])
{
	case 'et':
		$EpisodeInfo = $XBMC->GetEpisodeInformation($_GET['id']);
		$path = $EpisodeInfo['filePath'];
		$searchpath = $XBMC->XBMCUserDataPath."Thumbnails/";
		break;
	case 'sb':
		$ShowInfo = $XBMC->RetrieveShowInfo($_GET['id']);
		$path = $ShowInfo['folder'];
		$searchpath = $XBMC->XBMCUserDataPath."Thumbnails/";
		break;
	case 'sf':
		$ShowInfo = $XBMC->RetrieveShowInfo($_GET['id']);
		$path = $ShowInfo['folder'];
		$searchpath = $XBMC->XBMCUserDataPath."Thumbnails/Video/Fanart/";
	}
$filename = _get_hash($path).".tbn";
$filename2 = _get_hash($path).".jpg";
foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($searchpath)) as $file=>$cur) {
			if($cur->getFilename() == $filename)
			{
				if($_GET['ri'] == "1") {				
				echo(resizeImage($file,$_GET['w'],$_GET['h']));
} else {
				echo(file_get_contents($file));
}	
			break;
			}
			if($cur->getFilename() == $filename2)
			{
				echo(file_get_contents($file));
				break;
			}

		}
?>
