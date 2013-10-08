<?PHP
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Classe para Manipulação de Seções
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
### $Id: mgo_sec_section.class.php 10037 2012-08-08 11:35:43Z beckmi $
### =============================================================
include_once XOOPS_ROOT_PATH."/modules/".MGO_MOD_DIR."/class/mastop_geral.class.php";
class mgo_sec_section extends mastop_geral {
    function mgo_sec_section($id=null){
        $this->db =& XoopsDatabaseFactory::getDatabaseConnection();
        $this->tabela = $this->db->prefix(MGO_MOD_TABELA0);
        $this->id = "sec_10_id";
        $this->initVar("sec_10_id", XOBJ_DTYPE_INT);
        $this->initVar("sec_30_nome", XOBJ_DTYPE_TXTBOX);
        if ( !empty($id) ) {
            if ( is_array($id) ) {
                $this->assignVars($id);
            } else {
                $this->load(intval($id));
            }
        }

    }

    function contaDestaques($sec_10_id=null) {
        $id = (empty($sec_10_id)) ? $this->getVar($this->id) : $sec_10_id;
        $sec_dstac_query = $this->db->query("select count(*) as count from " . $this->db->prefix(MGO_MOD_TABELA1) . " where sec_10_id = " . $id);
        $sec_query = $this->db->fetchArray($sec_dstac_query);
        return intval($sec_query['count']);
    }
    function montaGaleria($altura, $section = 0, $setas = 1, $barra = 1, $delay = 6, $transp = 50, $largura="100%"){
        if ($section == 0) {
            $criterio = new CriteriaCompo(new Criteria("go2_12_ativo", 1));
        }else{
            $criterio = new CriteriaCompo(new Criteria("sec_10_id", $section));
            $criterio->add(new Criteria("go2_12_ativo", 1));
        }
        $go2_classe =& mgo_getClass(MGO_MOD_TABELA1);
        $dstacs = $go2_classe->PegaTudo($criterio);
        if (is_int($largura)) {
        	$largura = $largura."px";
        }
        if ($dstacs) {
            $ret = '
<script src="'.XOOPS_URL.'/modules/'.MGO_MOD_DIR.'/galeria/scripts/mootools.js" type="text/javascript"></script>
<script src="'.XOOPS_URL.'/modules/'.MGO_MOD_DIR.'/galeria/scripts/jd.js" type="text/javascript"></script>
<link rel="stylesheet" href="'.XOOPS_URL.'/modules/'.MGO_MOD_DIR.'/galeria/css/jd.css" type="text/css" media="screen" />
<style type="text/css">
#dstacs_'.$section.'
{
width: '.$largura.' !important;
height: '.$altura.'px !important;
z-index:5;
display: none;
border: 0px;
}
</style>
<script type="text/javascript">
function start_dstacs_'.$section.'() {
var dstacs_'.$section.' = new gallery($("dstacs_'.$section.'"), {
timed: '.((count($dstacs) > 1) ? 'true' : 'false').',
showArrows: '.(($setas == 1) ? 'true' : 'false').',
showInfopane: '.(($barra == 1) ? 'true' : 'false').',
delay: '.($delay*1000).',
slideInfoZoneOpacity: '.(($transp > 0) ? '0.'.intval(((100 - $transp) / 10)) : '1').',
embedLinks: true,
randomize: true
});
}
window.onDomReady(start_dstacs_'.$section.');
</script>
<!-- Mastop Go2 - http://www.mastop.com.br/produtos/go2/ -->
			';
            $ret .= '<div align="center"><div id="dstacs_'.$section.'">';
            foreach ($dstacs as $v) {
                if ($v->getVar("go2_11_target") == 0) {
                	$target = "";
                }else{
                    $target = "target='_blank'";
                }
                $ret .= '<div class="imageElement">';
                $ret .= ($v->getVar('go2_30_nome') != '') ? '<h3><a href="'.$v->pegaLink(false, false).'" title="'.$v->getVar("go2_30_nome").'" '.$target.' class="open">'.$v->getVar('go2_30_nome').'</a></h3>' : '<h3>&nbsp;</h3>';
                $ret .= '<p></p>';
                $ret .= $v->pegaLink(true);
                $ret .= '</div>';
            }
            $ret .= '</div></div>';
            return $ret;
        }else{
            return false;
        }
    }

}