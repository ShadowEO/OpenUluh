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
		
	include('config/application.php');
	if($config['debugOutput'] == true)
	{
		ini_set("display_errors","on");
	} else {
		ini_set("display_errors","off");
	}
	include('libs/XBMCHelper.class.php');
	$XBMC = new XBMCHelper();
	if(!$_GET['p'])
	{
		$page = "index";
	} else {
		$page = $_GET['p'];
	}
	include("templates/".$config['Template']."/header.php");

	switch($page)
	{
		case "episodes":
			if($config['Template'] == "openuluh-original")
			{
			include("templates/common/bodytag.normal.php");
			include("templates/".$config['Template']."/menu.php");
			include("templates/".$config['Template']."/showinfo.header.php");
			}
			include("templates/".$config['Template']."/episodes.php");
			break;
		case "shows":
			if($config['Template'] == "openuluh-original")
			{
			include("templates/common/bodytag.normal.php");
			include("templates/".$config['Template']."/menu.php");
			}
			include("templates/".$config['Template']."/showlist.php");
			break;
		case "episodeinfo":
			include("templates/common/bodytag.normal.php");
			if($config['Template'] == "openuluh-original")
			{
			include("templates/common/bodytag.normal.php");
			}
			include("templates/".$config['Template']."/episodeinfo.php");

			break;
		case "player":
			include("templates/common/bodytag.player.php");
			if($config['Template'] == "openuluh-original")
			{
			include("templates/".$config['Template']."/menu.php");
			include("templates/".$config['Template']."/episodeinfo.header.php");
			include("templates/".$config['Template']."/player.episodeinfo.php");
			}
			include("templates/".$config['Template']."/player.php");
			break;
		default:
			include("templates/common/bodytag.normal.php");
			if($config['Template'] == "openuluh-original")
			{
			include("templates/menu.php");
			}						
			include("templates/".$config['Template']."/index.php");
			break;
	}
	if(file_exists("templates/".$config['Template']."/before.footer.php"))
	{
		if($config['Template'] != "openuluh-original")
		{
			if(!defined("no-before-footer"))
			{
			include("templates/".$config['Template']."/before.footer.php");
			}
		}
	}
	include("templates/".$config['Template']."/footer.php");
?>



