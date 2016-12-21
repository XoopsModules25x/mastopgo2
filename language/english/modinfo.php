<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Arquivo de Tradução em inglês para Informações do Módulo
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
###
### =============================================================
// xoops_version.php
define('MGO_MOD_NOME', 'Mastop Go2');
define('MGO_MOD_DESC', 'A Spotlights Module');
define('MGO_MOD_DIR', 'mastop_go2');
define('MGO_MOD_TABELA0', 'mgo_sec_section');
define('MGO_MOD_TABELA1', 'mgo_go2_go2');
define('MGO_MOD_BLOCOS', 'Blocks');
define('MGO_MOD_BLOCO1', 'Spotlights');
define('MGO_MOD_BLOCO1_DESC', 'Block to show spotlights');
define('MGO_MOD_BLOCO1_FILE', 'mgo_go2.bloco.php');
define('MGO_MOD_BLOCO1_SHOW', 'mgo_go2_exibe');
define('MGO_MOD_BLOCO1_EDIT', 'mgo_go2_edita');
define('MGO_MOD_BLOCO1_TEMPLATE', 'mgo_go2.block.tpl');
define('MGO_MOD_DSTAC_IMG', 'Spotlights Images');
define('MGO_MOD_DSTAC_IMG_DES',
       "Select the image libraries that will keep the spotlights images.<br>Select using the <B>CTRL</B>.<br><p style='font-weight:bold; color:red; width: 550px'>  To added a category press <a href='admin.php?fct=images'>HERE.</a><br>If you added some images library after the installation of this module, update it so the added category will appears to the side.</p>");
// admin/menu.php
define('MGO_MOD_MENU_SEC', 'Sections');
define('MGO_MOD_MENU_GO2', 'Spotlights');
define('MGO_ADM_HOME', 'Home');
define('MGO_ADM_ABOUT', 'About');

// The name of this module
define('MI_MGO_NAME', 'Mastop Go2');

//Help
define('MI_MGO_DIRNAME', basename(dirname(dirname(__DIR__))));
define('MI_MGO_HELP_HEADER', __DIR__.'/help/helpheader.html');
define('MI_MGO_BACK_2_ADMIN', 'Back to Administration of ');
define('MI_MGO_OVERVIEW', 'Overview');

//define('MI_MGO_HELP_DIR', __DIR__);

//help multi-page
define('MI_MGO_DISCLAIMER', 'Disclaimer');
define('MI_MGO_LICENSE', 'License');
define('MI_MGO_SUPPORT', 'Support');
