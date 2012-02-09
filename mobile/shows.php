<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */	
	include("lib/jqmPhp.php");
	include("../libs/XBMCHelper.class.php");
	include("../config/application.php");
	$XBMC = new XBMCHelper();
	$jqm = new jqmPhp();
	if($_GET['ac'] == "si")
	{
		$page = new jqmPage('shows',array('data-add-back-btn=true'));
	}
	elseif($_GET['ac'] == "csl")
	{
		$page = new jqmPage('shows',array('data-add-back-btn'=>'true'));		
	} else {
		$page = new jqmPage('shows');
	}
	$currentPage = basename(__FILE__);
	switch($_GET['ac'])
	{
		case 'csl':
			$page->theme('b')->title('Shows');
			$page->header()->theme('a');		
			$nav = $page->header()->add(new jqmNavbar(), true);
			$nav->add(new jqmButton('', '', '', 'a', "index.php" , 'Home', '', false));
			$nav->add(new jqmButton('', '', '', 'a', 'shows.php?ac=sl', 'All Shows', '', false));
			$nav->add(new jqmButton('', '', '', 'a', '#', 'Channels', '', true));
			$list = new jqmListviem();
			$list->inset(true)->theme('a');
			$list->addDivider('Shows from '.$_GET['cn'], $XBMC->CountShowsByChannel($_GET['cn']))->dividerTheme('a')->countTheme('b');
			$Shows = $XBMC->SortShowsByChannel($_GET['cn']);
			foreach($Shows as $k=>$v)
			{	
			$list->AddSplit($v['SeriesName'],'shows.php?ac=si&id='.$v['idShow'],'#episodes.php?ac=el&id='.$v['idShow'],$XBMC->CountEpisodes($v['idShow']));
			}
			$page->AddContent($list);
			$jqm->AddPage($page);
			echo($jqm);			
			break;
		case 'sl':
			$page->theme('b')->title('All Shows');
			$page->header()->theme('a');	
			$nav = $page->header()->add(new jqmNavbar(), true);		
			$nav->add(new jqmButton('', '', '', 'a', "index.php" , 'Home', '', false));
			$nav->add(new jqmButton('', '', '', 'a', '#', 'All Shows', '', true));
			$nav->add(new jqmButton('', '', '', 'a', 'channels.php?ac=cl', 'Channels', '', false));
			$list = new jqmListviem();
			$list->inset(true)->theme('a');	
			$list->addDivider('Shows', $XBMC->CountShows())->dividerTheme('a')->countTheme('b');
			$Shows = $XBMC->RetrieveShowList();
			foreach($Shows as $k=>$v)
			{	
			$list->AddSplit($v['SeriesName'],'shows.php?ac=si&id='.$v['idShow'],'episodes.php?ac=el&id='.$v['idShow'],$XBMC->CountEpisodes($v['idShow']));
			}

			$page->AddContent($list);
			$jqm->AddPage($page);
			echo($jqm);			
			break;
		case 'si':
			$showInfo = $XBMC->RetrieveShowInfo($_GET['id']);
			$page->theme('b')->title($showInfo['SeriesName']);
//			$page->header()->addButton('Back',"#",'a', 'arrow-l')->addAttribute("rel","back");
			$page->AddContent('<img src="../getimage.php?ac=sb&ri=0&id='.$showInfo['idShow'].'" />');			

			$page->AddContent('<h4>'.$showInfo['SeriesDesc']."</h4>");
			$list = new jqmListviem();
			$list->inset(true)->theme('a');
			$list->addDivider('Episodes', $XBMC->CountEpisodes($_GET['id']))->dividerTheme('a')->countTheme('b');
			$Episodes = $XBMC->RetrieveEpisodesForShow($_GET['id']);
			$i = 0;
			foreach($Episodes as $k=>$v)
			{
				if($i == 4)
				{
					$list->AddBasic("More..",'episodes.php?ac=el&id='.$v['idShow']);
					break;
				}
				if(strlen($v['EpisodeDesc']) > 120)
				{
					$v['EpisodeDesc'] = substr($v['EpisodeDesc'],0,strpos($v['EpisodeDesc'],' ',120))."...";
				}				
				$list->AddIcon("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;S".$v['season']."E".$v['episode'].": ".$v['EpisodeName'],'episodes.php?ac=ei&id='.$v['idEpisode'],'../getimage.php?ac=et&ri=1&w=400&h=200&id='.$v['idEpisode']);
			}
			$page->AddContent($list);
			$jqm->AddPage($page);
			echo($jqm);			
			break;
	
	}
