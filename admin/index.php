<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Vazio
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
###
### =============================================================

require_once __DIR__ . '/admin_header.php';
xoops_cp_header();

$adminObject  = \Xmf\Module\Admin::getInstance();

$adminObject->displayNavigation(basename(__FILE__));
$adminObject->displayIndex();

require_once __DIR__ . '/admin_footer.php';
