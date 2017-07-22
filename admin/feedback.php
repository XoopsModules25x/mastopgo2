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
###
### =============================================================
use Xmf\Request;

require_once __DIR__ . '/admin_header.php';
$op = Request::getCmd('op', 'feature', 'GET');

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
        $yname          = Request::getString('yname', '', 'POST');
        $yemail         = Request::getString('yemail', '', 'POST');
        $ydomain        = Request::getString('ydomain', '', 'POST');
        $feedback_type  = Request::getString('feedback_type', '', 'POST');
        $feedback_other = Request::getString('feedback_other', '', 'POST');
        $titulo         = 'Mastop Go2 - FeedBack from ' . $ydomain;
        $body           = '<b>' . $yname . ' (' . $yemail . ') - ' . $ydomain . '</b><br>';
        $body           .= 'Type: ' . $feedback_type . ((!empty($feedback_other)) ? ' - ' . $feedback_other : '') . '<br>';
        $body           .= Request::getText('feedback_content', '', 'POST');
        $xoopsMailer    = xoops_getMailer();
        $xoopsMailer->useMail();
        $xoopsMailer->setToEmails('go2@mastop.com.br');
        $xoopsMailer->setFromEmail($yemail);
        $xoopsMailer->setFromName($yname);
        $xoopsMailer->setSubject($titulo);
        $xoopsMailer->multimailer->isHTML(true);
        $xoopsMailer->setBody($body);
        $xoopsMailer->send();
        $msg = '
      <div align="center" style="width: 80%; padding: 10px; padding-top:0px; padding-bottom: 5px; border: 2px solid #9C9C9C; background-color: #F2F2F2; margin-right:auto;margin-left:auto;">
        <h3>' . MGO_ADM_FEEDSUCCESS . '</h3>
      </div>
    ';

    case 'feature':
    default:
        mgo_adm_menu();
        echo (!empty($msg)) ? $msg . '<br>' : '';
        $form['titulo'] = MGO_ADM_FEEDBACKN;
        $form['op']     = 'salvar';
        include XOOPS_ROOT_PATH . '/modules/' . MGO_MOD_DIR . '/include/feedback.form.inc.php';
        $feedbackform->display();
        break;
}
echo "<div align='center' style='margin-top:10px;'><a href='http://www.mastop.com.br/produtos/go2/'><img src='../assets/images/mgo2_footer.gif'></a><br><a style='color: #029116; font-size:11px;' href='feedback.php'>"
     . MGO_ADM_FEEDBACK
     . "</a> - <a style='color: #FF0000; font-size:11px;' href='http://www.mastop.com.br/produtos/go2/checkversion.php?lang="
     . $xoopsConfig['language']
     . '&version='
     . round($xoopsModule->getVar('version') / 100, 2)
     . "' target='_blank'>"
     . MGO_ADM_CHKVERSION
     . '</a></div>';
xoops_cp_footer();
