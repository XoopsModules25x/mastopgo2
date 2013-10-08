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
### $Id: index.php 10037 2012-08-08 11:35:43Z beckmi $
### =============================================================
include_once 'admin_header.php';
xoops_cp_header();

$indexAdmin = new ModuleAdmin();

echo $indexAdmin->addNavigation('index.php');
echo $indexAdmin->renderIndex();

include 'admin_footer.php';
//xoops_cp_footer();