<?php
	/*
	 * OpenUluh version 0.0.1
	 *
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems
	 * Licensed under the GPLv3
	 * You are free to modify, distribute or redistribute this code as you please
	 * so long as the above copyright notice remains intact.
	 */
	include('lib/jqmPhp.php');
	include('../libs/XBMCHelper.class.php');
	include("../config/application.php");
	$jqm = new jqmPhp();
	$jqm->head()->title($config['AppTitle']);
	$page = new jqmPage('channels');
	$page->theme('b')->title($config['AppTitle']);
	$page->header()->theme('a');
	$nav = $page->header()->add(new jqmNavbar(), true);
	$nav->add(new jqmButton('', '', '', 'a', "index.php" , 'Home', '', false));
	$nav->add(new jqmButton('', '', '', 'a', 'shows.php?ac=sl', 'All Shows', '', false));
	$nav->add(new jqmButton('', '', '', 'a', '#', 'Channels', '', true));
	$XBMC = new XBMCHelper();
	switch($_GET['ac'])
	{
		case "cl":
	$list2 = new jqmListviem();
	$list2->inset(true)->theme('a');
	$list2->addDivider('Channels', $XBMC->RetrieveStudioCount())->dividerTheme('a')->countTheme('b');
	$Channels = $XBMC->RetrieveStudioList();
	$i = 0;
	foreach($Channels as $k=>$v)
	{
		$list2->AddIcon("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$v['strStudio'],'shows.php?ac=csl&cn='.$v['strStudio'],'../channel_images/'.$v['strStudio'].".png",$XBMC->CountShowsByChannel($v['strStudio']));
		$i++;
	}
	$page->AddContent($list2);
	$jqm->AddPage($page);
	break;
	default:
			$list2 = new jqmListviem();
	$list2->inset(true)->theme('a');
	$list2->addDivider('Channels', $XBMC->RetrieveStudioCount())->dividerTheme('a')->countTheme('b');
	$Channels = $XBMC->RetrieveStudioList();
	$i = 0;
	foreach($Channels as $k=>$v)
	{
		$list2->AddIcon("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$v['strStudio'],'shows.php?ac=csl&cn='.$v['strStudio'],'../channel_images/'.$v['strStudio'].".png",$XBMC->CountShowsByChannel($v['strStudio']));
		$i++;
	}
	$page->AddContent($list2);
	$jqm->AddPage($page);
	break;
}
	echo($jqm);
