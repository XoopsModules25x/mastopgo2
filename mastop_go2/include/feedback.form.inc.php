<?PHP
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Formulário de Feedback
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: feedback.form.inc.php 8102 2011-11-06 12:19:15Z beckmi $
### =============================================================
if (!defined('XOOPS_ROOT_PATH')) {
	die("Ooops!");
}
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
$feedbackform = new XoopsThemeForm($form['titulo'], "mpu_feedbackform", $_SERVER['PHP_SELF'], "post");
$feedbackform->addElement(new XoopsFormText(MGO_ADM_YNAME, "yname", 35, 50, $xoopsUser->getVar('name')));
$feedbackform->addElement(new XoopsFormText(MGO_ADM_YEMAIL, "yemail", 35, 50, $xoopsConfig['adminmail']));
$feedbackform->addElement(new XoopsFormText(MGO_ADM_YSITE, "ydomain", 35, 50, XOOPS_URL));
$feedback_category_tray = new XoopsFormElementTray(MGO_ADM_FEEDTYPE, "&nbsp;&nbsp;&nbsp;");
$category_select = new XoopsFormSelect("", "feedback_type", MGO_ADM_TSUGGESTION);
$category_select->addOptionArray(array(MGO_ADM_TSUGGESTION=>MGO_ADM_TSUGGESTION, MGO_ADM_TBUGS=>MGO_ADM_TBUGS, MGO_ADM_TESTIMONIAL=>MGO_ADM_TESTIMONIAL, MGO_ADM_TFEATURES=>MGO_ADM_TFEATURES, MGO_ADM_TOTHERS=>MGO_ADM_TOTHERS));
$feedback_category_tray->addElement($category_select);
$feedback_category_tray->addElement(new XoopsFormText(MGO_ADM_TOTHERS, "feedback_other", 25, 50));
$feedbackform->addElement($feedback_category_tray);
$textarea = new XoopsFormDhtmlTextArea(MGO_ADM_DESC, "feedback_content", "", 20);
$textarea->setExtra("style='width: 100%' class='mpu_wysiwyg'");
$feedbackform->addElement($textarea);
$feedbackform->addElement(new XoopsFormHidden('op', $form['op']));
$feedbackbotoes_tray = new XoopsFormElementTray("", "&nbsp;&nbsp;");
$feedbackbotao_cancel = new XoopsFormButton("", "cancelar", _CANCEL);
$feedbackbotoes_tray->addElement(new XoopsFormButton("", "submit", _SUBMIT, "submit"));
$feedbackbotao_cancel->setExtra("onclick=\"document.location= '".XOOPS_URL."/modules/".MGO_MOD_DIR."/admin/go2.php'\"");
$feedbackbotoes_tray->addElement($feedbackbotao_cancel);
$feedbackform->addElement($feedbackbotoes_tray);