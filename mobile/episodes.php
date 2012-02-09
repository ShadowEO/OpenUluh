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

	$XBMC = new XBMCHelper();
	$jqm = new jqmPhp();
	$page = new jqmPage('episodes',array('data-add-back-btn'=>'true'));
	$currentPage = basename(__FILE__);
	switch($_GET['ac'])
	{
		case 'el':
			$ShowInfo = $XBMC->RetrieveShowInfo($_GET['id']);
			$page->theme('b')->title($ShowInfo['SeriesName']);
			$page->header()->theme('a');	
			$page->AddContent("<h1>Episodes</h1>");
//			$page->header()->addButton('Back',"#shows.php?ac=si&id=".$_GET['id'],'a', 'arrow-l');
			$list = new jqmListviem();
			$list->inset(true)->theme('a');	
//			$list->addDivider('Episodes', $XBMC->CountShows())->dividerTheme('a')->countTheme('b');
			$Shows = $XBMC->RetrieveEpisodesForShow($_GET['id']);
			foreach($Shows as $k=>$v)
			{	
			$list->AddIcon("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;S".$v['season']."E".$v['episode'].": ".$v['EpisodeName'],'episodes.php?ac=ei&id='.$v['idEpisode'],'../getimage.php?ac=et&ri=1&w=400&h=200&id='.$v['idEpisode']);
			}

			$page->AddContent($list);
			$jqm->AddPage($page);
			echo($jqm);			
			break;
		case 'ei':
			$EpisodeInfo = $XBMC->GetEpisodeInformation($_GET['id']);
			$page->theme('b')->title($EpisodeInfo['EpisodeName']);
			$page->header()->theme('a');
//			$page->header()->addButton('Back',"#episodes.php?ac=el&id=".$EpisodeInfo['seriesid'], 'a', 'arrow-l');			
			$page->AddContent("<center><img src='../getimage.php?ac=et&ri=0&id=".$EpisodeInfo['idEpisode']."' /></center>");
			$cg = new jqmControlGroup('descript','','','c');			
			$btnWatch = new jqmButton('','','','a', '../stream.php?e='.$_GET['id'], 'Watch', 'arrow-r', false, true);
			$externalAtt = new jqmAttribute("rel","external");
			$btnWatch->addAttribute($externalAtt);
			$page->AddContent($btnWatch);
			$page->AddContent(new jqmButton('','','','a', '../download.php?e='.$_GET['id'], 'Download', 'arrow-r', false, true));
			$description = new jqmText("<br/><h3>".$EpisodeInfo['EpisodeDesc']."</h3><br/><h4>Channel: ".$EpisodeInfo['channel']."; Rating: ".$EpisodeInfo['rating']."; Original Air Date: ".$EpisodeInfo['airdate']."</h4>");
			$cg->Add($description);
			$page->AddContent($cg);
//			$page->AddContent("<br/>");
			$jqm->AddPage($page);
			echo($jqm);
			break;
	}
?>
