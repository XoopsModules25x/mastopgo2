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
###
### =============================================================

/**
 * @param      $classe
 * @param null $id
 *
 * @return bool
 */
function mgo_getClass($classe, $id = null)
{
    static $classes;
    if (!isset($classes[$classe])) {
        if (file_exists($arquivo = XOOPS_ROOT_PATH . '/modules/' . MGO_MOD_DIR . '/class/' . $classe . '.class.php')) {
            include_once $arquivo;
        }
        if (class_exists($classe)) {
            $classes[$classe] = new $classe($id);
        }
    } elseif (is_object($classes[$classe]) && !empty($id)) {
        $classes[$classe]->$classe($id);
    }

    return isset($classes[$classe]) && is_object($classes[$classe]) ? $classes[$classe] : false;
}

/**
 * @param $dirname
 *
 * @return bool
 */
function mgo_getModuleConfig($dirname)
{
    static $ModulesConfig;
    if (!isset($ModulesConfig[$dirname])) {
        /** @var XoopsModuleHandler $moduleHandler */
        $moduleHandler           = xoops_getHandler('module');
        $module                  = $moduleHandler->getByDirname($dirname);
        $configHandler           = xoops_getHandler('config');
        $ModulesConfig[$dirname] = $configHandler->getConfigsByCat(0, $module->getVar('mid'));
    }

    return isset($ModulesConfig[$dirname]) && is_array($ModulesConfig[$dirname]) ? $ModulesConfig[$dirname] : false;
}
