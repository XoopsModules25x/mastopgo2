<?php
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
###
### =============================================================
require_once XOOPS_ROOT_PATH . '/modules/' . MGO_MOD_DIR . '/class/mastop_geral.class.php';

/**
 * Class Mgo_sec_section
 */
class Mgo_sec_section extends Mastop_geral
{
    /**
     * Mgo_sec_section constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        $this->db     = XoopsDatabaseFactory::getDatabaseConnection();
        $this->tabela = $this->db->prefix(MGO_MOD_TABELA0);
        $this->id     = 'sec_10_id';
        $this->initVar('sec_10_id', XOBJ_DTYPE_INT, 0);
        $this->initVar('sec_30_nome', XOBJ_DTYPE_TXTBOX);
        if (!empty($id)) {
            if (is_array($id)) {
                $this->assignVars($id);
            } else {
                $this->load((int)$id);
            }
        }
    }

    /**
     * @param null $sec_10_id
     *
     * @return int
     */
    public function contaDestaques($sec_10_id = null)
    {
        $id              = empty($sec_10_id) ? $this->getVar($this->id) : $sec_10_id;
        $sec_dstac_query = $this->db->query('SELECT count(*) AS count FROM ' . $this->db->prefix(MGO_MOD_TABELA1) . ' WHERE sec_10_id = ' . $id);
        $sec_query       = $this->db->fetchArray($sec_dstac_query);

        return (int)$sec_query['count'];
    }

    /**
     * @param        $altura
     * @param int    $section
     * @param int    $setas
     * @param int    $barra
     * @param int    $delay
     * @param int    $transp
     * @param string $largura
     * @return bool|string
     */
    public function montaGaleria($altura, $section = 0, $setas = 1, $barra = 1, $delay = 6, $transp = 50, $largura = '100%')
    {
        if (0 == $section) {
            $criterio = new CriteriaCompo(new Criteria('go2_12_ativo', 1));
        } else {
            $criterio = new CriteriaCompo(new Criteria('sec_10_id', $section));
            $criterio->add(new Criteria('go2_12_ativo', 1));
        }
        $go2_classe = mgo_getClass(MGO_MOD_TABELA1);
        $dstacs     = $go2_classe->pegaTudo($criterio);
        if (is_int($largura)) {
            $largura = $largura . 'px';
        }
        if ($dstacs) {
            $ret = '
<script src="' . XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/assets/js/galeria/scripts/mootools.js" type="text/javascript"></script>
<script src="' . XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/assets/js/galeria/scripts/jd.js" type="text/javascript"></script>
<link rel="stylesheet" href="' . XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/assets/js/galeria/css/jd.css" type="text/css" media="screen">
<style type="text/css">
#dstacs_' . $section . '
{
width: ' . $largura . ' !important;
height: ' . $altura . 'px !important;
z-index:5;
display: none;
border: 0;
}
</style>
<script type="text/javascript">
function start_dstacs_' . $section . '() {
var dstacs_' . $section . ' = new Gallery($("dstacs_' . $section . '"), {
timed: ' . ((count($dstacs) > 1) ? 'true' : 'false') . ',
showArrows: ' . ((1 == $setas) ? 'true' : 'false') . ',
showInfopane: ' . ((1 == $barra) ? 'true' : 'false') . ',
delay: ' . ($delay * 1000) . ',
slideInfoZoneOpacity: ' . (($transp > 0) ? '0.' . (int)((100 - $transp) / 10) : '1') . ',
embedLinks: true,
randomize: true
});
}
window.onDomReady(start_dstacs_' . $section . ');
</script>
<!-- Mastop Go2 - http://www.mastop.com.br/produtos/go2/ -->
			';
            $ret .= '<div align="center"><div id="dstacs_' . $section . '">';
            foreach ($dstacs as $v) {
                if (0 == $v->getVar('go2_11_target')) {
                    $target = '';
                } else {
                    $target = "target='_blank'";
                }
                $ret .= '<div class="imageElement">';
                $ret .= ('' != $v->getVar('go2_30_nome')) ? '<h3><a href="' . $v->pegaLink(false, false) . '" title="' . $v->getVar('go2_30_nome') . '" ' . $target . ' class="open">' . $v->getVar('go2_30_nome') . '</a></h3>' : '<h3>&nbsp;</h3>';
                $ret .= '<p></p>';
                $ret .= $v->pegaLink(true);
                $ret .= '</div>';
            }
            $ret .= '</div></div>';

            return $ret;
        } else {
            return false;
        }
    }
}
