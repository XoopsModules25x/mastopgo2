<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Formulário Gerador de Código para Destaques
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: generator.form.inc.php 8102 2011-11-06 12:19:15Z beckmi $
### =============================================================
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
$picker_url = XOOPS_URL.'/modules/'.MGO_MOD_DIR.'/admin/color_picker';
echo '
    <style type="text/css">
<!--
#plugin { BACKGROUND: #0d0d0d; COLOR: #AAA; CURSOR: move; DISPLAY: none; FONT-FAMILY: arial; FONT-SIZE: 11px; PADDING: 7px 10px 11px 10px; _PADDING-RIGHT: 0; Z-INDEX: 1;  POSITION: absolute; WIDTH: 199px; _width: 210px; _padding-right: 0px; }
#plugin br { CLEAR: both; MARGIN: 0; PADDING: 0;  }
#plugin select { BORDER: 1px solid #333; BACKGROUND: #FFF; POSITION: relative; TOP: 4px; }

#plugHEX { FLOAT: left; }
#plugCLOSE { CURSOR: pointer; FLOAT: right; MARGIN: 0 8px 3px; _MARGIN-RIGHT: 10px; COLOR: #FFF; -moz-user-select: none; -khtml-user-select: none; user-select: none; }
#plugHEX:hover,#plugCLOSE:hover { COLOR: #FFD000;  }

#SV { background: #FF0000 url("'.$picker_url.'/SatVal.png"); _BACKGROUND: #FF0000; POSITION: relative; CURSOR: crosshair; FLOAT: left; HEIGHT: 166px; WIDTH: 167px; _WIDTH: 165px; MARGIN-RIGHT: 10px; filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src="'.$picker_url.'/SatVal.png", sizingMethod="scale"); -moz-user-select: none; -khtml-user-select: none; user-select: none; }
#SVslide { BACKGROUND: url("'.$picker_url.'/slide.gif"); HEIGHT: 9px; WIDTH: 9px; POSITION: absolute; _font-size: 1px; line-height: 1px; }

#H { BORDER: 1px solid #000; CURSOR: crosshair; FLOAT: left; HEIGHT: 154px; POSITION: relative; WIDTH: 19px; PADDING: 0; TOP: 4px; -moz-user-select: none; -khtml-user-select: none; user-select: none; }
#Hslide { BACKGROUND: url("'.$picker_url.'/slideHue.gif"); HEIGHT: 5px; WIDTH: 33px; POSITION: absolute; _font-size: 1px; line-height: 1px; }
#Hmodel { POSITION: relative; TOP: -5px; }
#Hmodel div { HEIGHT: 1px; WIDTH: 19px; font-size: 1px; line-height: 1px; MARGIN: 0; PADDING: 0; }
-->
</style>
 <script src="'.$picker_url.'/plugin.js" type="text/JavaScript"></script>
 <script type="text/javascript">
var atual_color = "campo_img";
var atual_campo = "campo";
function pegaPicker(campo, e){
atual_color = campo.name+"_img";
atual_campo = campo.name;
$S("plugin").left= (XY(e)-10)+"px";
$S("plugin").top= (XY(e,1)+10)+"px";
toggle("plugin");
updateH(campo.value);
$("plugHEX").innerHTML=campo.value
loadSV();
}

function mkColor(v) {
$S(atual_color).background="#"+v;
$(atual_campo).value=v;
}
function troca(campo, nome){
if(campo.checked){
$(nome).value = 1;
}else{
$(nome).value = 0;
}
}
</script>
	';
echo <<< PICKER
	<div id="plugin" onmousedown="HSVslide('drag','plugin',event)" style="Z-INDEX: 20; display:none">
 <div id="plugHEX" onmousedown="stop=0; setTimeout('stop=1',100); toggle('plugin');">&nbsp</div><div id="plugCLOSE" onmousedown="toggle('plugin')">X</div><br>
 <div id="SV" onmousedown="HSVslide('SVslide','plugin',event)" title="Saturation + Value">
  <div id="SVslide" style="TOP: -4px; LEFT: -4px;"><br /></div>
 </div>
 <div id="H" onmousedown="HSVslide('Hslide','plugin',event)" title="Hue">
  <div id="Hslide" style="TOP: -7px; LEFT: -8px;"><br /></div>
  <div id="Hmodel"></div>
 </div>
</div>
PICKER;
$sec_classe =& mgo_getClass(MGO_MOD_TABELA0);
$sec_todos = $sec_classe->pegaTudo();
$sec_select = array();
if ($sec_todos) {
    foreach ($sec_todos as $v) {
        $sec_select[$v->getVar($v->id)] = $v->getVar("sec_30_nome");
    }
}
$dstac_form = new XoopsThemeForm(MGO_MAI_FORM_TITLE, 'dstacform', $_SERVER['PHP_SELF'], 'post');
$section_select = new XoopsFormSelect(MGO_MAI_SECTION, "sec_10_id", ((!empty($sec_10_id)) ? $sec_10_id : null));
$section_select->addOptionArray($sec_select);
$dstac_form->addElement($section_select);
$dstac_form->addElement(new XoopsFormText(MGO_MAI_WIDTH, "mgo_w", 5, 5, ((!empty($mgo_w)) ? $mgo_w : "100%")));
$dstac_form->addElement(new XoopsFormText(MGO_MAI_HEIGHT, "mgo_h", 5, 5, ((!empty($mgo_h)) ? $mgo_h : 200)));
$dstac_form->addElement(new XoopsFormRadioYN(MGO_MAI_SETAS, "setas", ((isset($setas)) ? $setas : 1)));
$dstac_form->addElement(new XoopsFormRadioYN(MGO_MAI_BARRA, "barra", ((isset($barra)) ? $barra : 1)));
$dstac_form->addElement(new XoopsFormText(MGO_MAI_DELAY, "delay", 5, 5, ((!empty($delay)) ? $delay : 6)));
$cor_barra_tray = new XoopsFormElementTray(MGO_MAI_BARCOLOR);
$cor_barra = new XoopsFormText("", "barcolor", 7, 6, ((!empty($barcolor)) ? $barcolor : "333333"));
$cor_barra->setExtra('onblur=\'$S(this.name+"_img").background="#"+this.value;\'');
$cor_barra_tray->addElement($cor_barra);
$cor_barra_tray->addElement(new XoopsFormLabel("", '<img id="barcolor_img" align="absmiddle" src="'.$picker_url.'/color.gif" onmouseover="this.style.border=\'2px solid black\'"  onmouseout="this.style.border=\'2px solid #DEE3E7\'" onclick=\'pegaPicker($("barcolor"), event)\' style="border: 2px solid #DEE3E7; background: #'.((!empty($barcolor)) ? $barcolor : "333333").'">'));
$dstac_form->addElement($cor_barra_tray);

$cor_texto_tray = new XoopsFormElementTray(MGO_MAI_TEXTCOLOR);
$cor_texto = new XoopsFormText("", "textcolor", 7, 6, ((!empty($textcolor)) ? $textcolor : "FFFFFF"));
$cor_texto->setExtra('onblur=\'$S(this.name+"_img").background="#"+this.value;\'');
$cor_texto_tray->addElement($cor_texto);
$cor_texto_tray->addElement(new XoopsFormLabel("", '<img id="textcolor_img" align="absmiddle" src="'.$picker_url.'/color.gif" onmouseover="this.style.border=\'2px solid black\'"  onmouseout="this.style.border=\'2px solid #DEE3E7\'" onclick=\'pegaPicker($("textcolor"), event)\' style="border: 2px solid #DEE3E7; background: #'.((!empty($textcolor)) ? $textcolor : "FFFFFF").'">'));
$dstac_form->addElement($cor_texto_tray);
$transp_tray = new XoopsFormElementTray(MGO_MAI_TRANSP);
$transp_tray->addElement(new XoopsFormText("", "transp", 3, 3, ((!empty($transp)) ? $transp : 50)));
$transp_tray->addElement(new XoopsFormLabel("", "%"));
$dstac_form->addElement($transp_tray);
$align_select = new XoopsFormSelect(MGO_MAI_ALIGN, "align", ((!empty($align)) ? $align : "middle"));
$align_select->addOptionArray(array("middle"=>MGO_MAI_ALIGN_MIDDLE, "left"=>MGO_MAI_ALIGN_LEFT, "right"=>MGO_MAI_ALIGN_RIGHT));
$dstac_form->addElement($align_select);
$dstac_form->addElement(new XoopsFormButton("", "submit", MGO_MAI_GENERATE, "submit"));