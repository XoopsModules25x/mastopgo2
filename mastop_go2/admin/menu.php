<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Menu da Administração
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: menu.php 10037 2012-08-08 11:35:43Z beckmi $
### =============================================================

defined("XOOPS_ROOT_PATH") or die("XOOPS root path not defined");

$dirname = basename(dirname(dirname(__FILE__)));
$module_handler = xoops_gethandler('module');
$module = $module_handler->getByDirname($dirname);
$pathIcon32 = $module->getInfo('icons32');

//xoops_loadLanguage('admin', $dirname);


$adminmenu = array();
$i = 1;
$adminmenu[$i]["title"] = MGO_ADM_HOME;
$adminmenu[$i]["link"]  = "admin/index.php";
$adminmenu[$i]["icon"] = $pathIcon32.'/home.png';
$i++;
$adminmenu[$i]["title"] = MGO_MOD_MENU_SEC;
$adminmenu[$i]["link"]  = "admin/sec.php";
$adminmenu[$i]["icon"] = $pathIcon32.'/category.png';
$i++;
$adminmenu[$i]['title'] = MGO_MOD_MENU_GO2;
$adminmenu[$i]['link'] = "admin/go2.php";
$adminmenu[$i]["icon"] = $pathIcon32.'/alert.png';
$i++;
// $adminmenu[$i]['title'] = MGO_MOD_BLOCOS;
// $adminmenu[$i]['link'] = "admin/blocksadmin.php";
// $adminmenu[$i]["icon"] = $pathIcon32.'/block.png';
// $i++;
$adminmenu[$i]["title"] = MGO_ADM_ABOUT;
$adminmenu[$i]["link"]  = "admin/about.php";
$adminmenu[$i]["icon"] = $pathIcon32.'/about.png';