<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Arquivo para Solicitação de Recursos
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: feedback.php 8102 2011-11-06 12:19:15Z beckmi $
### =============================================================
include 'admin_header.php';
$op = (isset($_GET['op'])) ? $_GET['op'] : 'feature';
if (isset($_GET)) {
	foreach ($_GET as $k => $v) {
		$$k = $v;
	}
}

if (isset($_POST)) {
	foreach ($_POST as $k => $v) {
		$$k = $v;
	}
}
switch ($op) {
	case 'salvar':
		$yname = $_POST['yname'];
		$yemail = $_POST['yemail'];
		$ydomain = $_POST['ydomain'];
		$feedback_type = $_POST['feedback_type'];
		$feedback_other = $_POST['feedback_other'];
		$titulo = "Mastop Go2 - FeedBack from ".$ydomain;
		$body = "<b>".$yname." (".$yemail.") - ".$ydomain."</b><br />";
		$body .= "Type: ".$feedback_type.((!empty($feedback_other)) ? " - ".$feedback_other : "")."<br />";
		$body .= $_POST['feedback_content'];
		$xoopsMailer =& getMailer();
		$xoopsMailer->useMail();
		$xoopsMailer->setToEmails('go2@mastop.com.br');
		$xoopsMailer->setFromEmail($yemail);
		$xoopsMailer->setFromName($yname);
		$xoopsMailer->setSubject($titulo);
		$xoopsMailer->multimailer->IsHTML(true);
		$xoopsMailer->setBody($body);
		$xoopsMailer->send();
		$msg = '
			<div align="center" style="width: 80%; padding: 10px; padding-top:0px; padding-bottom: 5px; border: 2px solid #9C9C9C; background-color: #F2F2F2; margin-right:auto;margin-left:auto;">
			<h3>'.MGO_ADM_FEEDSUCCESS.'</h3>
			</div>
			';
	case 'feature':
	default:
		mgo_adm_menu();
		echo (!empty($msg)) ? $msg."<br />" : '';
		$form['titulo'] = MGO_ADM_FEEDBACKN;
		$form['op'] = "salvar";
		include XOOPS_ROOT_PATH."/modules/".MGO_MOD_DIR."/include/feedback.form.inc.php";
		$feedbackform->display();
		break;
}
echo "<div align='center' style='margin-top:10px'><a href='http://www.mastop.com.br/produtos/go2/'><img src='images/mgo2_footer.gif'></a><br /><a style='color: #029116; font-size:11px' href='feedback.php'>".MGO_ADM_FEEDBACK."</a> - <a style='color: #FF0000; font-size:11px' href='http://www.mastop.com.br/produtos/go2/checkversion.php?lang=".$xoopsConfig['language']."&version=".round($xoopsModule->getVar('version') / 100, 2)."' target='_blank'>".MGO_ADM_CHKVERSION."</a></div>";
xoops_cp_footer();