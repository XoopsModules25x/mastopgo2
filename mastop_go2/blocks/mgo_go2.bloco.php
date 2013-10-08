<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Bloco de Destaques
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: mgo_go2.bloco.php 8102 2011-11-06 12:19:15Z beckmi $
### =============================================================
if (!defined('MGO_MOD_DIR')) {
    if ( file_exists(XOOPS_ROOT_PATH."/modules/".MGO_BLO_MODDIR."/language/".$xoopsConfig['language']."/modinfo.php") ) {
        include_once(XOOPS_ROOT_PATH."/modules/".MGO_BLO_MODDIR."/language/".$xoopsConfig['language']."/modinfo.php");
    } else {
        include_once(XOOPS_ROOT_PATH."/modules/".MGO_BLO_MODDIR."/language/portuguesebr/modinfo.php");
    }
}
include_once XOOPS_ROOT_PATH."/modules/".MGO_BLO_MODDIR."/include/funcoes.inc.php";
function mgo_go2_exibe($options){
    $sec_classe =& mgo_getClass(MGO_MOD_TABELA0);
    $dstacs = $sec_classe->montaGaleria($options[1], $options[0], $options[2], $options[3], $options[4], $options[7]);
    if ($dstacs) {
        $block = array();
        $block['dstac'] = $dstacs;
        $block['mgo_blo_bgcolor'] = $options[5];
        $block['mgo_blo_txtcolor'] = $options[6];
        $block['mgo_blo_section'] = $options[0];
    }else{
        return false;
    }
    return $block;
}
function mgo_go2_edita($options){
    $picker_url = XOOPS_URL.'/modules/'.MGO_MOD_DIR.'/admin/color_picker';
    $form = '
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
    $form .=
    <<< PICKER
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
    $sec_select = "<option value='0' ".(($options[0] == 0) ? "selected='selected'" : "").">"._ALL."</option>";
    if ($sec_todos) {
        foreach ($sec_todos as $v) {
            $sec_select .= "<option value='".$v->getVar($v->id)."' ".(($options[0] == $v->getVar($v->id)) ? "selected='selected'" : "").">".$v->getVar("sec_30_nome")."</option>";
        }
    }
    $form .= MGO_BLO_SHOW_SECTION." <select name='options[0]'>".$sec_select."</select><br />";
    $form .= MGO_BLO_ALTURA." <input type='text' name='options[1]' value='".$options[1]."' /><br />";
    $form .= MGO_BLO_SETAS."&nbsp;<input type='radio' name='options[2]' value='1'";
    if ( $options[2] == 1 ) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;"._YES."<input type='radio' name='options[2]' value='0'";
    if ( $options[2] == 0 ) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;"._NO."<br />";
    $form .= MGO_BLO_BARRA."&nbsp;<input type='radio' name='options[3]' value='1'";
    if ( $options[3] == 1 ) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;"._YES."<input type='radio' name='options[3]' value='0'";
    if ( $options[3] == 0 ) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;"._NO."<br />";
    $form .= MGO_BLO_DELAY." <input type='text' name='options[4]' value='".$options[4]."' /><br />";
    $form .= MGO_BLO_BGCOLOR. ' #<input size="6" type="text" name="options[5]" id="options[5]" value="'.$options[5].'" onblur=\'$S(this.name+"_img").background="#"+this.value;\'><img id="options[5]_img" align="absmiddle" src="'.$picker_url.'/color.gif" onmouseover="this.style.border=\'2px solid black\'"  onmouseout="this.style.border=\'2px solid #DEE3E7\'" onclick=\'pegaPicker($("options[5]"), event)\' style="border: 2px solid #DEE3E7; background: #'.$options[5].'"><br />';
    $form .= MGO_BLO_TXTCOLOR. ' #<input size="6" type="text" name="options[6]" id="options[6]" value="'.$options[6].'" onblur=\'$S(this.name+"_img").background="#"+this.value;\'><img id="options[6]_img" align="absmiddle" src="'.$picker_url.'/color.gif" onmouseover="this.style.border=\'2px solid black\'"  onmouseout="this.style.border=\'2px solid #DEE3E7\'" onclick=\'pegaPicker($("options[6]"), event)\' style="border: 2px solid #DEE3E7; background: #'.$options[6].'"><br />';
    $form .= MGO_BLO_TRANSP." <input type='text' size='3' name='options[7]' value='".$options[7]."' />%<br />";
    return $form;
}