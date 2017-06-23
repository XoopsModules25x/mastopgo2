<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Header com includes padrões para a Admin do Módulo
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
###
### =============================================================

use Xmf\Language;
use Xmf\Module\Admin;
use Xmf\Module\Helper;

require_once __DIR__ . '/../../../include/cp_header.php';
require_once $GLOBALS['xoops']->path('www/class/xoopsformloader.php');


$moduleDirName = basename(dirname(__DIR__));

//require_once $GLOBALS['xoops']->path('www/include/cp_functions.php');
//require_once $GLOBALS['xoops']->path('www/include/cp_header.php');
//require_once $GLOBALS['xoops']->path('www/class/xoopsformloader.php');
//require_once __DIR__ . '/../class/utility.php';

xoops_loadLanguage('admin', $moduleDirName);
xoops_loadLanguage('modinfo', $moduleDirName);
xoops_loadLanguage('main', $moduleDirName);
require_once __DIR__ . '/../include/funcoes.inc.php';

if (false !== ($moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName))) {
} else {
    $moduleHelper = Xmf\Module\Helper::getHelper('system');
}
/** @var Xmf\Module\Admin $adminObject */
$adminObject = Xmf\Module\Admin::getInstance();
$pathIcon16    = Admin::iconUrl('', 16);
$pathIcon32    = Admin::iconUrl('', 32);
$pathModIcon32 = $moduleHelper->getModule()->getInfo('modicons32');

$c['lang']['filtros']      = MGO_ADM_FILTROS;
$c['lang']['exibir']       = MGO_ADM_EXIBIR;
$c['lang']['exibindo']     = MGO_ADM_EXIBINDO;
$c['lang']['por_pagina']   = MGO_ADM_PORPAGINA;
$c['lang']['acao']         = MGO_ADM_ACAO;
$c['lang']['semresult']    = MGO_ADM_SEMRESULT;
//$c['lang']['showhidemenu'] = MGO_ADM_SHOWHIDEMENU;

$c['lang']['group_action']   = MGO_ADM_GRP_ACTION;
$c['lang']['group_erro_sel'] = MGO_ADM_GRP_ERR_SEL;
$c['lang']['group_del']      = MGO_ADM_GRP_DEL;
$c['lang']['group_del_sure'] = MGO_ADM_GRP_DEL_SURE;


//xoops_cp_header();
//$pathModuleAdmin = $xoopsModule->getInfo('dirmoduleadmin');
//
//include_once $GLOBALS['xoops']->path($pathModuleAdmin . '/moduleadmin.php');

/** @var Xmf\Module\Admin $adminObject */
$adminObject = Xmf\Module\Admin::getInstance();

$myts = MyTextSanitizer::getInstance();

if (!isset($GLOBALS['xoopsTpl']) || !($GLOBALS['xoopsTpl'] instanceof XoopsTpl)) {
    require_once $GLOBALS['xoops']->path('class/template.php');
    $xoopsTpl = new XoopsTpl();
}

// Local icons path
$xoopsTpl->assign('pathModIcon16', $pathIcon16);
$xoopsTpl->assign('pathModIcon32', $pathIcon32);
/*

function mgo_adm_menu()
{
    global $xoopsModule, $xoopsConfig, $xoopsModuleConfig;
    $adm_url = XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/admin/';
    $links[] = array(0 => XOOPS_URL . '/modules/system/admin.php?fct=preferences&op=showmod&mod=' . $xoopsModule->getVar('mid'), 1 => _PREFERENCES);
    //xoops_cp_header();

    echo '
        <link rel="stylesheet" type="text/css" href="../assets/js/menu/style_menu.css" />
        <script type="text/javascript" src="../assets/js/menu/jsdomenu.js"></script>
        <script type="text/javascript" src="../assets/js/menu/jsdomenubar.js"></script>
        <script type="text/javascript">
        function createjsDOMenu() {
          mainMenu1 = new jsDOMenu(170);
          with (mainMenu1) {
            addMenuItem(new menuItem("' . _ADD . '", "", "' . $adm_url . 'sec.php?op=novo"));
            addMenuItem(new menuItem("' . MGO_ADM_GER . '", "", "' . $adm_url . 'sec.php?op=listar"));
          }

          mainMenu2 = new jsDOMenu(170);
          with (mainMenu2) {
            addMenuItem(new menuItem("' . _ADD . '", "", "' . $adm_url . 'go2.php?op=novo"));
            addMenuItem(new menuItem("' . MGO_ADM_GER . '", "", "' . $adm_url . 'go2.php?op=listar"));
          }

          mainMenu3 = new jsDOMenu(150);
          with (mainMenu3) {
            addMenuItem(new menuItem("' . MGO_ADM_BLOCKS . '", "", "' . $adm_url . 'blocksadmin.php"));
            addMenuItem(new menuItem("' . _PREFERENCES . '", "", "' . XOOPS_URL . '/modules/system/admin.php?fct=preferences&op=showmod&mod=' . $xoopsModule->getVar('mid') . '"));
          }

          menuBar = new jsDOMenuBar();
          with (menuBar) {
            addMenuBarItem(new menuBarItem("' . MGO_ADM_SEC . '", mainMenu1, "cliid"));
            addMenuBarItem(new menuBarItem("' . MGO_ADM_GO2 . '", mainMenu2, "prdid"));
            addMenuBarItem(new menuBarItem("' . _OPTIONS . '", mainMenu3, "optid"));
          }
          menuBar.items.cliid.showIcon("sec", "sec", "sec");
          menuBar.items.prdid.showIcon("go2", "go2", "go2");
          menuBar.items.optid.showIcon("opt", "opt", "opt");
          menuBar.moveTo(680, 81);
        }</script>';
}
*/
