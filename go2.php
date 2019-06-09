<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Arquivo de redirecionamento de link
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
###
### =============================================================
use Xmf\Request;

require_once dirname(dirname(__DIR__)) . '/mainfile.php';
require_once __DIR__ . '/header.php';
$tac        = Request::getInt('tac', 0);
//$go2_classe = mgo_getClass(MGO_MOD_TABELA1, $tac);
$go2_classe = new \XoopsModules\Mastopgo2\Go2($tac);
if (empty($tac) || '' == $go2_classe->getVar('go2_30_link')) {
    exit();
}
$go2_classe->atualizaCount();
header('Location: ' . $go2_classe->getVar('go2_30_link'));
exit();
