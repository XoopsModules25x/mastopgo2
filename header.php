<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Header do Módulo
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
###
### =============================================================
include XOOPS_ROOT_PATH . '/header.php';

$moduleDirName = basename(__DIR__);
xoops_loadLanguage('modinfo', $moduleDirName);

require_once XOOPS_ROOT_PATH . '/modules/' . MGO_MOD_DIR . '/include/funcoes.inc.php';
