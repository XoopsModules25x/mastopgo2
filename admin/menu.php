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

$moduleDirName = basename(dirname(__DIR__));

if (false !== ($moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName))) {
} else {
    $moduleHelper = Xmf\Module\Helper::getHelper('system');
}


$pathIcon32 = \Xmf\Module\Admin::menuIconPath('');
//$pathModIcon32 = $moduleHelper->getModule()->getInfo('modicons32');

$moduleHelper->loadLanguage('modinfo');

$adminmenu              = [];
$i                      = 1;
'title' =>  MGO_ADM_HOME,
'link' =>  'admin/index.php',
'icon' =>  $pathIcon32 . '/home.png',
++$i;

'title' =>  MGO_MOD_MENU_SEC,
'link' =>  'admin/sec.php',
'icon' =>  $pathIcon32 . '/category.png',
++$i;

'title' =>  MGO_MOD_MENU_GO2,
'link' =>  'admin/go2.php',
'icon' =>  $pathIcon32 . '/alert.png',
++$i;

// 'title' =>  MGO_MOD_BLOCOS,
// 'link' =>  "admin/blocksadmin.php",
// $adminmenu[$i]["icon"]  = $pathIcon32.'/block.png';
// ++$i;

'title' =>  MGO_ADM_ABOUT,
'link' =>  'admin/about.php',
'icon' =>  $pathIcon32 . '/about.png',
