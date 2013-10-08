<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Index do Módulo
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: index.php 8102 2011-11-06 12:19:15Z beckmi $
### =============================================================
include_once "../../mainfile.php";
include_once "header.php";
if (!$_POST) {
    echo "<h1>".$xoopsModule->getVar("name")."</h1>";
    echo MGO_MAI_DESC."<br /><br />";
    include_once XOOPS_ROOT_PATH."/modules/".MGO_MOD_DIR."/include/generator.form.inc.php";
    $dstac_form->display();
}else{
    if (isset($_POST)) {
        foreach ($_POST as $k => $v) {
            $$k = $v;
        }
    }
    $sec_classe =& mgo_getClass(MGO_MOD_TABELA0, $sec_10_id);
    if (empty($sec_10_id) || $sec_classe->getVar('sec_10_id') == '' || $sec_classe->contaDestaques() == 0) {
        xoops_error(sprintf(MGO_MAI_SEC_404, $sec_classe->getVar("sec_30_nome")));
    }else{
        $iframe = '<iframe src="'.XOOPS_URL.'/modules/'.MGO_MOD_DIR.'/tac.php?sec_id='.$sec_10_id;
        $iframe .= ($mgo_w != "100%") ? '&w='.$mgo_w : '';
        $iframe .= ($mgo_h != 200) ? '&h='.intval($mgo_h) : '';
        $iframe .= ($setas == 0) ? '&noarrows=1' : '';
        $iframe .= ($barra == 0) ? '&notextbar=1' : '';
        $iframe .= ($delay != 6) ? '&delay='.intval($delay) : '';
        $iframe .= ($barcolor != "333333") ? '&barcolor='.$barcolor : '';
        $iframe .= ($textcolor != "FFFFFF") ? '&textcolor='.$textcolor : '';
        $iframe .= ($transp != 50) ? '&bartransp='.$transp : '';
        $iframe .= '" scrolling="no" frameborder="0" width="'.$mgo_w.'" height="'.$mgo_h.'" marginheight="0" marginwidth="0" align="'.$align.'"></iframe>';
        echo "<h3>".MGO_MAI_FORM_TITLE."</h3>";
        echo $iframe;
        echo "<br /><br />".MGO_MAI_COPY_PASTE."<br /><br />";
        echo "<textarea rows='5' style='width:90%; padding:5px; margin-top:10px; margin-bottom:10px;' onfocus='this.select();' >".$iframe."</textarea>";
    }
    include_once XOOPS_ROOT_PATH."/modules/".MGO_MOD_DIR."/include/generator.form.inc.php";
    $dstac_form->display();
}

include_once XOOPS_ROOT_PATH.'/footer.php';