<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Formul�rio de Envio de Destaques
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: go2.form.inc.php 10471 2012-12-19 10:31:08Z beckmi $
### =============================================================
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . "/modules/" . MGO_MOD_DIR . "/class/formimage.php";
$go2_form      = new XoopsThemeForm($form['titulo'], 'go2form', 'go2.php', 'post', TRUE);
$imagem_select = new MastopFormSelectImage(MGO_ADM_IMAGEM, "go2_30_imagem", $go2_classe->getVar("go2_30_imagem"), ((
    is_array($xoopsModuleConfig['mgo_des_img'])
        && $xoopsModuleConfig['mgo_des_img'][0] != "") ? $xoopsModuleConfig['mgo_des_img'] : NULL));
$go2_form->addElement($imagem_select);
$section_select = new XoopsFormSelect(MGO_ADM_SECTION, "sec_10_id", (($go2_classe->getVar("go2_10_id")
    != "") ? $go2_classe->getVar("sec_10_id") : ((!empty($_REQUEST['sec_10_id'])) ? $_REQUEST['sec_10_id'] : 0)));
$section_select->addOptionArray($sec_select);
$go2_form->addElement($section_select);
$go2_form->addElement(new XoopsFormText(MGO_ADM_GO2_30_NOME, "go2_30_nome", 30, 100, $go2_classe->getVar("go2_30_nome")), TRUE);
$go2_form->addElement(new XoopsFormText(MGO_ADM_GO2_30_LINK, "go2_30_link", 30, 150, $go2_classe->getVar("go2_30_link")), FALSE);
$link_select = new XoopsFormSelect(MGO_ADM_GO2_11_TARGET, "go2_11_target", $go2_classe->getVar("go2_11_target"));
$link_select->addOptionArray(array(0 => MGO_ADM_GO2_11_TARGET_0, 1 => MGO_ADM_GO2_11_TARGET_1));
$go2_form->addElement($link_select);
//$go2_form->addElement(new XoopsFormRadioYN(MGO_ADM_ATIVO, 'go2_12_ativo', $go2_classe->getVar("go2_12_ativo")));


$statontxt
    = "&nbsp;<img src=" . $pathIcon16 . '/1.png' . ' ' . "alt='" . MGO_ADM_ATIVO . "' />&nbsp;" . MGO_ADM_ATIVO
    . "&nbsp;&nbsp;&nbsp;";
$statofftxt
    = "&nbsp;<img src=" . $pathIcon16 . '/0.png' . ' ' . "alt='" . MGO_ADM_NONATIVO . "' />&nbsp;" . MGO_ADM_NONATIVO
    . "&nbsp;";
//$formstat = new XoopsFormRadioYN(_AM_XPARTNERS_STATUS, 'status', 1, $statontxt, $statofftxt);

$go2_form->addElement(new XoopsFormRadioYN(MGO_ADM_ATIVO, 'go2_12_ativo', $go2_classe->getVar("go2_12_ativo"), $statontxt, $statofftxt));


$go2_form->addElement(new XoopsFormHidden('go2_10_id', $go2_classe->getVar("go2_10_id")));
$go2_form->addElement(new XoopsFormHidden('op', "salvar"));
$go2botoes_tray  = new XoopsFormElementTray("", "&nbsp;&nbsp;");
$go2botao_cancel = new XoopsFormButton("", "cancelar", _CANCEL);
$go2botoes_tray->addElement(new XoopsFormButton("", "submit", _SUBMIT, "submit"));
$go2botao_cancel->setExtra("onclick=\"history.go(-1);\"");
$go2botoes_tray->addElement($go2botao_cancel);
$go2_form->addElement($go2botoes_tray);