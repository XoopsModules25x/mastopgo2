<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Formulário de envio de Seções
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: sec.form.inc.php 8102 2011-11-06 12:19:15Z beckmi $
### =============================================================
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
$sec_form = new XoopsThemeForm($form['titulo'], 'secform', 'sec.php', 'post', true);
$sec_form->addElement(new XoopsFormText(MGO_ADM_NOME, "sec_30_nome", 30, 100, $sec_classe->getVar("sec_30_nome")), true);
$sec_form->addElement(new XoopsFormHidden('sec_10_id',  $sec_classe->getVar("sec_10_id")));
$sec_form->addElement(new XoopsFormHidden('op', "salvar"));
$secbotoes_tray = new XoopsFormElementTray("", "&nbsp;&nbsp;");
$secbotao_cancel = new XoopsFormButton("", "cancelar", _CANCEL);
$secbotoes_tray->addElement(new XoopsFormButton("", "submit", _SUBMIT, "submit"));
$secbotao_cancel->setExtra("onclick=\"history.go(-1);\"");
$secbotoes_tray->addElement($secbotao_cancel);
$sec_form->addElement($secbotoes_tray);