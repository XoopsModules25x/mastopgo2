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
        //        if (file_exists($arquivo = XOOPS_ROOT_PATH . '/modules/' . MGO_MOD_DIR . '/class/' . $classe . '.class.php')) {
        //            require_once $arquivo;
        //        }
        if (class_exists($classe)) {
            $classtemp        = '\XoopsModules\Mastopgo2\\' . $classe;
            $classes[$classe] = new $classtemp($id);
        }
    } elseif (is_object($classes[$classe]) && !empty($id)) {
        $classes[$classe]->__construct($id);
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
    static $modulesConfig;
    if (!isset($modulesConfig[$dirname])) {
        /** @var \XoopsModuleHandler $moduleHandler */
        $moduleHandler           = xoops_getHandler('module');
        $module                  = $moduleHandler->getByDirname($dirname);
        $configHandler           = xoops_getHandler('config');
        $modulesConfig[$dirname] = $configHandler->getConfigsByCat(0, $module->getVar('mid'));
    }

    return isset($modulesConfig[$dirname]) && is_array($modulesConfig[$dirname]) ? $modulesConfig[$dirname] : false;
}
