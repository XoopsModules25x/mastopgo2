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
### $Id: header.php 8102 2011-11-06 12:19:15Z beckmi $
### =============================================================
include XOOPS_ROOT_PATH."/header.php";
if ( file_exists("language/".$xoopsConfig['language']."/modinfo.php") ) {
	include_once("language/".$xoopsConfig['language']."/modinfo.php");
} else {
	include_once("language/portuguesebr/modinfo.php");
}
include_once XOOPS_ROOT_PATH."/modules/".MGO_MOD_DIR."/include/funcoes.inc.php";