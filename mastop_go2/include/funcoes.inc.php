<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Funções Padrão para o Módulo
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: funcoes.inc.php 8102 2011-11-06 12:19:15Z beckmi $
### =============================================================
function mgo_getClass($classe, $id = null){
	static $classes;
	if (!isset($classes[$classe])) {
		if ( file_exists($arquivo = XOOPS_ROOT_PATH . "/modules/".MGO_MOD_DIR."/class/".$classe.".class.php")) {
			include_once $arquivo;
		}
		if (class_exists($classe)) {
			$classes[$classe] = new $classe($id);
		}
	}elseif (is_object($classes[$classe]) && !empty($id)){
		$classes[$classe]->$classe($id);
	}
	return isset($classes[$classe]) && is_object($classes[$classe]) ? $classes[$classe] : false;
}

function mgo_getModuleConfig($dirname){
	static $ModulesConfig;
	if (!isset($ModulesConfig[$dirname])) {
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname($dirname);
		$config_handler =& xoops_gethandler('config');
		$ModulesConfig[$dirname] =& $config_handler->getConfigsByCat(0,$module->getVar('mid'));
	}
	return isset($ModulesConfig[$dirname]) && is_array($ModulesConfig[$dirname]) ? $ModulesConfig[$dirname] : false;
}