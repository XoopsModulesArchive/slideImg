<?php

//include_once 'admin_header.php';
include_once '../../../include/cp_header.php';

include_once XOOPS_ROOT_PATH . "/modules/slideImg/class/class.slidebloc.php";


if ( isset( $_POST ) )
{
    foreach ( $_POST as $k => $v )
    {
        ${$k} = $v;
    }
}

$op = 'list';

if(isset($_REQUEST['op'])){$op = $_REQUEST['op'];}
if(($op=='edit' OR $op=='del') AND !isset($_REQUEST['sid'])){redirect_header('index.php', 3, _AM_SI_WRONGWAY);}
	$sid=isset($_REQUEST['sid'])?$_REQUEST['sid']:'new';
	$UrlVal = new slidebloc($sid);

if($op != 'post'){
	//include XOOPS_ROOT_PATH."/header.php";
	xoops_cp_header();
	
// Sous-menu
echo '<div class="head" align="center">';
echo $op == 'new' ? _AM_SI_ADMIN_NEW : '<a href="index.php?op=new">' . _AM_SI_ADMIN_NEW . '</a>';
echo ' | ';
echo $op == 'list' ? _AM_SI_ADMIN_LIST : '<a href="index.php">' . _AM_SI_ADMIN_LIST . '</a>';
echo ' | ';
echo '<a href="../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule->getVar('mid').'">' . _AM_SI_ADMIN_CONFIG . '</a>';
echo '</div><br>';
}

switch ($op)
{
	case "post":
		$UrlVal->name=$name;
		$UrlVal->imgurl=$imgurl;
		$UrlVal->url=$url;
		if(!$UrlVal->storeVal())
			{
				redirect_header("index.php", 10,_AM_SI_ERROR_MODIFY);
				exit();
			}
		redirect_header("./index.php", 1, _AM_SI_DBUPDATED);
	break;
	case 'new':
	case 'edit':
		// include du formloader
		include XOOPS_ROOT_PATH."/class/xoopsformloader.php";

		$myForm = new XoopsThemeForm(_AM_SI_ADMIN_NEW, "myForm", "index.php");
		$myForm->addElement(new XoopsFormText(_AM_SI_ADMIN_NAME, "name", 20, 255, $UrlVal->name), true);
		$myForm->addElement(new XoopsFormText(_AM_SI_ADMIN_IMG, "imgurl", 20, 255, $UrlVal->imgurl), true);
		$myForm->addElement(new XoopsFormText(_AM_SI_ADMIN_URL, "url", 20, 255, $UrlVal->url), true);
		$button_tray = new XoopsFormElementTray('' ,'');
		$button_tray->addElement(new XoopsFormButton('', 'post', _AM_SI_ADMIN_SEND, 'submit')); 
		$myForm -> addElement(new XoopsFormHidden('op', 'post'));	
		$myForm -> addElement(new XoopsFormHidden('sid', $sid));
		$myForm->addElement($button_tray); 
		
		$myForm->display();
		//include XOOPS_ROOT_PATH."/footer.php";1
	break;
	case 'list':
	default:
		$query = $xoopsDB->query(' SELECT * FROM ' . $xoopsDB->prefix('slideimg_items'));
		echo '<table width="100%" cellspacing="1" class="outer">';
		echo '<tr>';
		echo '<th align="center" width="10%">ID</th>';
		echo '<th align="center" width="30%">' . _AM_SI_ADMIN_IMG . '</th>';
		echo '<th align="center" width="20%">' . _AM_SI_ADMIN_NAME . '</th>';
		echo '<th align="center" width="10%">' . _AM_SI_ADMIN_URL . '</th>';		
		echo '<th align="center" width="10%">' . _AM_SI_ADMIN_ACTION . '</th>';		
		echo '</tr>';
		$class = 'odd';
		
		while($myrow = $xoopsDB->fetchArray($query) ) {     		                    
			 $id = $myrow['sid'];
			 $name = $myrow['name'];
			 $imgurl = $myrow['imgurl'];
			 $url = $myrow['url'];
			 
			echo '<tr class="'.$class.'">';
			echo '<td align="center">'.$id.'</td>';
			echo '<td align="center"><center><img src="'.$imgurl.'" alt="'._AM_SI_ADMIN_IMG.'" title="'._AM_SI_ADMIN_IMG.'" /></center></td>';
			echo '<td align="center">'.$name.'</td>';
			echo '<td align="center"><center><a href="'.$url.'"><img src="../images/url.png" alt="'._AM_SI_ADMIN_URL.'" title="'._AM_SI_ADMIN_URL.'" /></a></center></td>';       
			echo '<td align="center" width="10%"><center>';
			echo '<a href="index.php?op=edit&sid=' . $id . '"><img src="../images/edit_mini.gif" alt="'._AM_SI_ADMIN_EDIT.'" title="'._AM_SI_ADMIN_EDIT.'"></a> ';
			echo '<a href="index.php?op=del&sid=' . $id . '"><img src="../images/delete_mini.gif" alt="'._AM_SI_ADMIN_DEL.'" title="'._AM_SI_ADMIN_DEL.'"></a>';
			echo '</center></td>';   				
			echo '</tr>';
			$class = ($class == 'even') ? 'odd' : 'even';
		}
		echo '</table>';
	
	break;
	case 'del':
		$sql = 'DELETE FROM '.$xoopsDB->prefix('slideimg_items').' WHERE sid='.$sid;
		$xoopsDB ->queryF($sql);
	break;
}

xoops_cp_footer();

?>
