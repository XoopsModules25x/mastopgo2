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
###
### =============================================================

include_once XOOPS_ROOT_PATH . '/modules/' . MGO_MOD_DIR . '/class/mastop_geral.class.php';

/**
 * Class Mgo_sec_section
 */
class Mgo_sec_section extends Mastop_geral
{
    /**
     * @param null $id
     */
    public function __construct($id = null)
    {
        $this->db     = XoopsDatabaseFactory::getDatabaseConnection();
        $this->tabela = $this->db->prefix(MGO_MOD_TABELA0);
        $this->id     = 'sec_10_id';
        $this->initVar('sec_10_id', XOBJ_DTYPE_INT);
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
     *
     * @return array|bool
     */
    public function montaGaleria(
        $altura,
        $section = 0,
        $setas = 1,
        $barra = 1,
        $delay = 6,
        $transp = 50,
        $largura = '100%'
    ) {
        if ($section == 0) {
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

        $ret = array();
        if ($dstacs) {
            /*
          $ret = '<div id="demo">
            <div class="container">
              <div class="row">
                <div class="span12">
                  <div id="owl-demo" class="owl-carousel">';
                    foreach ($dstacs as $v) {
                      $ret .= '<div class="item">';
          */
            foreach ($dstacs as $v) {
                $ret['slide'][] = $v->pegaLink(true);
            }

            /*
                    $ret .= '</div>';
                    }

             $ret .= '</div>
                    </div>
                  </div>
                </div>
            </div>';
            */

            return $ret;
        } else {
            return false;
        }
    }
}
