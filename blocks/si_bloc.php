<?php

function b_si_show()
{
	include_once XOOPS_ROOT_PATH . "/modules/slideImg/class/class.slidebloc.php";
	
  $module_handler =& xoops_gethandler('module');
  $module =& $module_handler->getByDirname('slideImg');
  $config_handler =& xoops_gethandler('config');
  $moduleConfig =& $config_handler->getConfigsByCat(0, $module->getVar('mid')); 
  
	$block = array();
	$items = array();
	
	global $xoopsDB;
	$query = $xoopsDB->query(' SELECT * FROM ' . $xoopsDB->prefix('slideimg_items'));
	
	
	$i=0;
	while($myrow = $xoopsDB->fetchArray($query) ) {     		                  
		$items[$i]['sid'] = $myrow['sid'];
		$items[$i]['name'] = $myrow['name'];
		$items[$i]['imgurl'] = $myrow['imgurl'];
		$items[$i]['url'] = $myrow['url'];
		$i++;
	}
	$block['items'] = $items ;
	
		$block['si_height'] = $moduleConfig['si_height'];
		$block['si_width'] = $moduleConfig['si_width'];
		$block['si_align'] = $moduleConfig['si_align'];
		$block['si_title'] = $moduleConfig['si_title'];
		
	return $block;
}

