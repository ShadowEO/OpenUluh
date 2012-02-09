<?php
	$nav = $page->header()->add(new jqmNavbar(), true);
	$nav->add(new jqmButton('', '', '', 'a', "index.php" , 'Home', '', ($currentPage == "index.php" ? true : false)));
	$nav->add(new jqmButton('', '', '', 'a', 'shows.php?ac=sl', 'All Shows', '', ($currentPage == "shows" ? true : false)));
	$nav->add(new jqmButton('', '', '', 'a', 'channels.php?ac=cl', 'Channels', '', ($currentPage == "channels" ? true : false)));
?>
