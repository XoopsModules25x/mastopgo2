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
###
### =============================================================

use XoopsModules\Mastopgo2;

// require_once  dirname(__DIR__) . '/class/Helper.php';
//require_once  dirname(__DIR__) . '/include/common.php';
$helper = Mastopgo2\Helper::getInstance();

$pathIcon32 = \Xmf\Module\Admin::menuIconPath('');
$pathModIcon32 = $helper->getModule()->getInfo('modicons32');


$adminmenu[] = [
'title' =>  MGO_ADM_HOME,
'link' =>  'admin/index.php',
'icon' =>  $pathIcon32 . '/home.png',
];

$adminmenu[] = [

'title' =>  MGO_MOD_MENU_SEC,
'link' =>  'admin/sec.php',
'icon' =>  $pathIcon32 . '/category.png',
];

$adminmenu[] = [

'title' =>  MGO_MOD_MENU_GO2,
'link' =>  'admin/go2.php',
'icon' =>  $pathIcon32 . '/alert.png',
];

//$adminmenu[] = [
// 'title' =>  MGO_MOD_BLOCOS,
// 'link' =>  "admin/blocksadmin.php",
// $adminmenu[$i]["icon"]  = $pathIcon32.'/block.png';
//];

$adminmenu[] = [

'title' =>  MGO_ADM_ABOUT,
'link' =>  'admin/about.php',
'icon' =>  $pathIcon32 . '/about.png',
];
