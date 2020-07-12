<?php

// Main Info

$modversion['name'] = _MI_SI_NAME;
$modversion['version'] = "1.0";
$modversion['description'] = _MI_SI_DESC;
$modversion['credits'] = "Tarik";
$modversion['author'] = "Tarik [www.xo-aminoss.info]";
$modversion['help'] = "";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "images/SI_logo.png";
$modversion['dirname'] = "slideImg";

//SQL

$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0] = "slideimg_items";

//Admin

$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";

//Menu

$modversion['hasMain'] = 1;

// Templates

$modversion['templates'][1]['file']='si_index.html';
$modversion['templates'][1]['description']= '';

// Blocks
$modversion['blocks'][1]['file'] = "si_bloc.php";
$modversion['blocks'][1]['name'] = _MI_SI_BNAME1;
$modversion['blocks'][1]['description'] = _MI_SI_DESC;
$modversion['blocks'][1]['show_func'] = "b_si_show";
$modversion['blocks'][1]['options'] = "";
$modversion['blocks'][1]['edit_func'] = "";
$modversion['blocks'][1]['template'] = 'si_block.html';

// Search
$modversion['hasSearch'] = 0;

// Smarty
$modversion['use_smarty'] = 1;

// PREFERENCE

$i = 0;
$i++;
$modversion['config'][$i]['name'] = 'si_width';
$modversion['config'][$i]['title'] = '_MI_SI_ADMIN_WIDTH';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 100;

$i++;
$modversion['config'][$i]['name'] = 'si_height';
$modversion['config'][$i]['title'] = '_MI_SI_ADMIN_HEIGHT';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 100;

$i++;
$modversion['config'][$i]['name'] = 'si_align';
$modversion['config'][$i]['title'] = '_MI_SI_ADMIN_ALIGN';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['options'] = array(_LEFT  => 'left',_CENTER  => 'center',_RIGHT  => 'right');
$i++;
$modversion['config'][$i]['name'] = 'si_title';
$modversion['config'][$i]['title'] = '_MI_SI_ADMIN_SHOW';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['options'] = array(_MI_SI_ADMIN_CHOICE0  => 0,
                                   		_MI_SI_ADMIN_CHOICE1   => 1);


?>
