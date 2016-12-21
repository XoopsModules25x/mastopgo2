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
### $Id: index.php 12503 2014-04-25 15:02:18Z beckmi $
### =============================================================

include_once 'admin_header.php';
xoops_cp_header();

$indexAdmin = new ModuleAdmin();

echo $indexAdmin->addNavigation('index.php');
echo $indexAdmin->renderIndex();

include 'admin_footer.php';
