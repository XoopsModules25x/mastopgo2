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

include_once __DIR__ . '/admin_header.php';
xoops_cp_header();

$indexAdmin = new ModuleAdmin();

echo $indexAdmin->addNavigation(basename(__FILE__));
echo $indexAdmin->renderIndex();

include_once __DIR__ . '/admin_footer.php';
