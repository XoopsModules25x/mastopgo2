<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Arquivo que retorna os destaques de uma determinada seção
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: tac.php 8102 2011-11-06 12:19:15Z beckmi $
### =============================================================
/**
 * Valores esperados:
 *
 * $_GET['sec_id'] = ID da Seção (a ausência deste parâmetro retorna Página em Branco)
 * $_GET['w'] = Largura (padrão 100%)
 * $_GET['h'] = Altura em pixels (padrão 200)
 * $_GET['noarrows'] = 1 para NÃO exibir as setas de navegação (a ausência deste parâmetro faz com que as setas sejam exibidas)
 * $_GET['notextbar'] = 1 para NÃO exibir a barra de texto (a ausência deste parâmetro faz com que a barra de texto seja exibida)
 * $_GET['delay'] = Tempo de transição entre os destaques - em segundos - (padrão 6)
 * $_GET['barcolor'] = Cor da barra de texto em HEXADECIMAL SEM # (padrão 333333)
 * $_GET['textcolor'] = Cor do texto em HEXADECIMAL SEM # (padrão FFFFFF)
 * $_GET['bartransp'] = Transparência da Barra de Texto SEM O SÍMBOLO % (padrão 50)
 *
 */
include_once "../../mainfile.php";
$xoopsLogger->activated = false;
include_once "header.php";
if (isset($_GET)) {
    foreach ($_GET as $k => $v) {
        $$k = $v;
    }
}
$tac = (!empty($_GET['sec_id'])) ? intval($_GET['sec_id']) : 0;
$sec_classe =& mgo_getClass(MGO_MOD_TABELA0, $tac);
if (empty($tac) || $sec_classe->getVar('sec_10_id') == '' || $sec_classe->contaDestaques() ==0) {
    exit();
}else{
    $w = !empty($w) ? $w : "100%";
    $h = !empty($h) ? intval($h) : 200;
    $setas = empty($noarrows) ? 1 : 0;
    $barra = empty($notextbar) ? 1 : 0;
    $delay = !empty($delay) ? intval($delay) : 6;
    $barcolor = !empty($barcolor) ? $barcolor : "333333";
    $textcolor = !empty($textcolor) ? $textcolor : "FFFFFF";
    $bartransp = !empty($bartransp) ? intval($bartransp) : 50;
    echo '
<style type="text/css">
div#dstacs_'.$tac.'.jdGallery .slideInfoZone
{
	position: absolute;
	z-index: 17;
	width: 100%;
	margin: 0px;
	left: 0;
	bottom: 0;
	height: 30px;
	background: #'.$barcolor.';
	color: #'.$textcolor.';
	text-indent: 0;
	overflow: hidden;
}
div#dstacs_'.$tac.'.jdGallery .slideInfoZone div a
{
	padding: 0;
	margin: 0;
	font-family: Tahoma, Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: normal !important;
	color:#'.$textcolor.' !important;
	text-decoration:none;
}
</style>
';
    echo $sec_classe->montaGaleria($h, $tac, $setas, $barra, $delay, $bartransp, $w);
}