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
###
### =============================================================

require_once __DIR__ . '/../../mainfile.php';
require_once __DIR__ . '/header.php';
if (!$_POST) {
    echo '<h1>' . $xoopsModule->getVar('name') . '</h1>';
    echo MGO_MAI_DESC . '<br><br>';
    require_once XOOPS_ROOT_PATH . '/modules/' . MGO_MOD_DIR . '/include/generator.form.inc.php';
    $dstac_form->display();
} else {
    if (isset($_POST)) {
        foreach ($_POST as $k => $v) {
            $$k = $v;
        }
    }
    $sec_classe = mgo_getClass(MGO_MOD_TABELA0, $sec_10_id);
    if (empty($sec_10_id) || '' === $sec_classe->getVar('sec_10_id') || 0 == $sec_classe->contaDestaques()) {
        xoops_error(sprintf(MGO_MAI_SEC_404, $sec_classe->getVar('sec_30_nome')));
    } else {
        $iframe = '<iframe src="' . XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/tac.php?sec_id=' . $sec_10_id;
        $iframe .= ('100%' !== $mgo_w) ? '&w=' . $mgo_w : '';
        $iframe .= (200 != $mgo_h) ? '&h=' . (int)$mgo_h : '';
        $iframe .= (0 == $setas) ? '&noarrows=1' : '';
        $iframe .= (0 == $barra) ? '&notextbar=1' : '';
        $iframe .= (6 != $delay) ? '&delay=' . (int)$delay : '';
        $iframe .= ('333333' != $barcolor) ? '&barcolor=' . $barcolor : '';
        $iframe .= ('FFFFFF' !== $textcolor) ? '&textcolor=' . $textcolor : '';
        $iframe .= (50 != $transp) ? '&bartransp=' . $transp : '';
        $iframe .= '" scrolling="no" frameborder="0" width="' . $mgo_w . '" height="' . $mgo_h . '" marginheight="0" marginwidth="0" align="' . $align . '"></iframe>';
        echo '<h3>' . MGO_MAI_FORM_TITLE . '</h3>';
        echo $iframe;
        echo '<br><br>' . MGO_MAI_COPY_PASTE . '<br><br>';
        echo "<textarea rows='5' style='width:90%; padding:5px; margin-top:10px; margin-bottom:10px;' onfocus='this.select();' >" . $iframe . '</textarea>';
    }
    require_once XOOPS_ROOT_PATH . '/modules/' . MGO_MOD_DIR . '/include/generator.form.inc.php';
    $dstac_form->display();
}

require_once XOOPS_ROOT_PATH . '/footer.php';
