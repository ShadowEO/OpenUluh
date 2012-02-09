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
	$currentPage = basename(__FILE__);
	$XBMC = new XBMCHelper();	
	$jqm = new jqmPhp();
	$jqm->head()->title($config['AppTitle']);
//	$jqm->head()->add(new jqmLink("themes/PandoraTV.min.css"));
	$page = new jqmPage('index');
	$page->theme('b')->title($config['AppTitle']);
	$page->header()->theme('a');
	$nav = $page->header()->add(new jqmNavbar(), true);
	$nav->add(new jqmButton('', '', '', 'a', "index.php" , 'Home', '', true));
	$nav->add(new jqmButton('', '', '', 'a', 'shows.php?ac=sl', 'All Shows', '', false));
	$nav->add(new jqmButton('', '', '', 'a', 'channels.php?ac=cl', 'Channels', '', false));
	//$page->AddContent('<h1>Pandora TV</h1>');	
	$g = $page->addContent(new jqmGrid(), true);
	$g->grid('b');
	$ShowsList = $XBMC->RetrieveShowList();
	$randshows = shuffle($ShowsList);
	$column1 = 0;	
	$column2 = 0;
	$list = new jqmListviem();
	$list->inset(true)->theme('a');
	$list->addDivider('Random Shows')->dividerTheme('a')->countTheme('b');
	foreach($ShowsList as $k=>$v)
	{
		if($column1 != 4)
		{		
		$list->AddBasic($v['SeriesName'],'shows.php?ac=si&id='.$v['idShow']);
		$column1++;
		}
	}
	$page->AddContent($list);
	$list = new jqmListviem();
	$list->inset(true)->theme('a');	
	$list->addDivider('Shows', $XBMC->CountShows())->dividerTheme('a')->countTheme('b');
	$Shows = $XBMC->RetrieveShowList();
	$i = 0;	
	foreach($Shows as $k=>$v)
	{
		if($i == 7)
		{
			$list->AddBasic("More..",'shows.php?ac=sl');
			break;
		}		
		$list->AddSplit($v['SeriesName'],'shows.php?ac=si&id='.$v['idShow'],'episodes.php?ac=el&id='.$v['idShow'],$XBMC->CountEpisodes($v['idShow']));
		$i++;
	}
	$page->AddContent($list);
	$list2 = new jqmListviem();
	$list2->inset(true)->theme('a');
	$list2->addDivider('Channels', $XBMC->RetrieveStudioCount())->dividerTheme('a')->countTheme('b');
	$Channels = $XBMC->RetrieveStudioList();
	$i = 0;
	foreach($Channels as $k=>$v)
	{
		if($i == 4)
		{
			$list2->AddBasic("More..",'channels.php?ac=cl');
			break;
		}
		$list2->AddIcon("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$v['strStudio'],'shows.php?ac=csl&cn='.$v['strStudio'],'../channel_images/'.$v['strStudio'].".png",$XBMC->CountShowsByChannel($v['strStudio']));
		$i++;
	}
	$page->AddContent($list2);
	$jqm->AddPage($page);
		
	echo($jqm);
?>
