<?php

	include(PERCH_CORE.'/apps/content/runtime.php');
	include(PERCH_CORE.'/apps/content/PerchContent_PageTemplates.class.php');
	include(PERCH_CORE.'/apps/content/PerchContent_PageTemplate.class.php');

	$Settings    = PerchSettings::fetch();

	$Users       = new PerchUsers;
	$CurrentUser = $Users->get_mock_user();

	$Pages       = new PerchContent_Pages;
	
	$pages = $Pages->get_page_tree();

	if (PerchUtil::count($pages)==0) {
		$Pages->create_defaults($CurrentUser);	
	}
	