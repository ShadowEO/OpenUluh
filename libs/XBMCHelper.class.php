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

	class XBMCHelper
	{
		// Change this to point to your XBMC userdata path (For grabbing thumbnails and banners)
		public $XBMCUserDataPath = '/Users/toxus/Library/Application Support/XBMC/userdata/';
		public $XBMCTVShowsPath = '/local/path/to/your/TV Shows/'; // If you sync multiple XBMC instances
		public $pagination_perpage = 3; // Change amount of results
		// Change these to reflect XBMC's MySQL information.
		public $mySQLServer = 'localhost:8889';
		public $mySQLusername = 'root';
		public $mySQLpassword = 'root';	
		
		// Do not change anything below this line.
		public $idEpisode;
		public $EpisodeDesc;
		public $SeriesName;
		public $filename;
		public $seriesid;
		public $channel;
		public $rating;
		public $airdate;
		public $mysqlConn;

		function XBMCHelper()
		{
			$conn = mysql_connect($this->mySQLServer,$this->mySQLusername,$this->mySQLpassword);
			if(!$conn)
			{
				die();
			}
			mysql_select_db('MyVideos58');
			$this->mysqlConn = $conn;
		}

		function RetrieveEpisodesforShow($ShowID, $offset = 0)
		{
			if($offset != null)
			{
				$query = mysql_query("SELECT * FROM `episodeview` WHERE `idShow`=$ShowID ORDER BY `c05` DESC LIMIT $offset, ".$this->pagination_perpage.";");
			} else {
				$query = mysql_query("SELECT * FROM  `episodeview` WHERE  `idShow` =$ShowID ORDER BY  `c05` DESC ");
			}
			$i = 0;
			$array = false;			
			while ($row = mysql_fetch_object($query))
			{
				$array[$i]['idEpisode'] = $row->idEpisode;
				$array[$i]['EpisodeName'] = $row->c00;
				$array[$i]['EpisodeDesc'] = $row->c01;
				$array[$i]['SeriesName'] = $row->strTitle;
				$array[$i]['airdate'] = $row->c05;
				$array[$i]['rating'] = $row->mpaa;
				$array[$i]['season'] = $row->c12;
				$array[$i]['episode'] = $row->c13;
				$array[$i]['channel'] = $row->strStudio;		
				$i++;
			}
			if($array)
			{
				return $array;
			} else {
				return false;
			}
		}

		function CountEpisodes($idShow)
		{
			$query = mysql_query("SELECT * FROM episodeview WHERE idShow = $idShow;");
			$count = mysql_num_rows($query);
			return $count;
		}
	
		function CountShows()
		{
			$query = mysql_query("SELECT * FROM tvshowview;");
			$count = mysql_num_rows($query);
			return $count;
		}

		function CountShowsByChannel($channel)
		{
			$query = mysql_query("SELECT * FROM tvshowview WHERE c14 = '".mysql_escape_string($channel)."';");
			$count = mysql_num_rows($query);
			return $count;
		}

		function RetrieveShowInfo($idShow)
		{
			$query = mysql_query("SELECT * FROM tvshow WHERE idShow = $idShow;");
			$row = mysql_fetch_object($query);
			$array['idShow'] = $idShow;
			$array['SeriesName'] = $row->c00;
			$array['SeriesDesc'] = $row->c01;
			$array['Genre'] = $row->c08;
			$array['rating'] = $row->c13;
			$array['channel'] = $row->c14;
			$array['folder'] = $row->c16;
			$array['airdate'] = $row->c05;
			return $array;
		}	
		
		

		function RetrieveShowList($offset = null)
		{
			if($offset != null)
			{
				$query = mysql_query("SELECT * FROM tvshow LIMIT $offset, ".$this->pagination_perpage.";");
			} else {
				$query = mysql_query("SELECT * FROM tvshow");
			}
			$i = 0;
			while ($row = mysql_fetch_object($query))
			{
				$array[$i]['idShow'] = $row->idShow;
				$array[$i]['SeriesName'] = $row->c00;
				$array[$i]['SeriesDesc'] = $row->c01;
				$array[$i]['Genre'] = explode("/", $row->c08);
				$array[$i]['rating'] = $row->c13;
				$array[$i]['channel'] = $row->c14;
				$array[$i]['airdate'] = $row->c05;
				$i++;			
			}
			return $array;
		}

		function SortShowsByChannel($channelName, $offset = null)
		{
			if($offset != null)
			{
				$query = mysql_query("SELECT * FROM tvshow WHERE c14 = '".mysql_escape_string($channelName)."' LIMIT $offset, ".$this->pagination_perpage.";");
			} else {
				$query = mysql_query("SELECT * FROM tvshow WHERE c14 = '".mysql_escape_string($channelName)."';");
			}
			$i = 0;
			while ($row = mysql_fetch_object($query))
			{
				$array[$i]['idShow'] = $row->idShow;
				$array[$i]['SeriesName'] = $row->c00;
				$array[$i]['SeriesDesc'] = $row->c01;
				$array[$i]['Genre'] = explode("/", $row->c08);
				$array[$i]['rating'] = $row->c13;
				$array[$i]['channel'] = $row->c14;
				$array[$i]['airdate'] = $row->c05;
				$i++;
			}
			return $array;
		}

		function GetEpisodeInformation($idEpisode)
		{
			$query = mysql_query("SELECT * FROM episodeview WHERE idEpisode = '$idEpisode';");
			$idObject = mysql_fetch_object($query);
			if(!$idObject)
			{
				return 404;
			}
			$array['idEpisode'] = $idEpisode;
			$array['EpisodeDesc'] = $idObject->c01;
			$array['EpisodeName'] = $idObject->c00;
			$array['filePath'] = $idObject->c18;
			$array['SeriesName'] = $idObject->strTitle;
			$array['filename'] = $idObject->strFileName;
			$array['seriesid'] = $idObject->idShow;
			$array['channel'] = $idObject->strStudio;
			$array['rating'] = $idObject->mpaa;
			$array['airdate'] = $idObject->premiered;
			$array['season'] = $idObject->c12;
			$array['episode'] = $idObject->c13;		
			return $array;
		}

		function RetrieveStudioList($offset = null)
		{
			if($offset != null)
			{
			$query = mysql_query("SELECT * FROM studio LIMIT $offest,".$this->pagination_perpage.";", $this->mysqlConn);
			} else {
			$query = mysql_query("SELECT * FROM studio;");
			}
			$i = 0;			
			while($idObject = mysql_fetch_object($query))
			{
				$array[$i]['strStudio'] = $idObject->strStudio;
				$i++;
			}
			return $array;
		}

		function RetrieveStudioCount()
		{
			$query = mysql_query("SELECT * FROM studio;", $this->mysqlConn);
			$count = mysql_num_rows($query);
			return $count;		
		}


			
	}
?>
