<?PHP
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Classe para Colocar as imagens da biblioteca em um Select
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
###
### =============================================================

// defined('XOOPS_ROOT_PATH') || exit('XOOPS root path not defined');

require_once XOOPS_ROOT_PATH . '/class/xoopsform/formselect.php';

/**
 * Class MastopFormSelectImage
 */
class MastopFormSelectImage extends XoopsFormSelect
{
    /**
     * OptGroup
     * @var array
     * @access    private
     */
    public $_optgroups   = array();
    public $_optgroupsID = array();

    /**
     * Construtor
     *
     * @param    string $caption
     * @param    string $name
     * @param mixed  $value Valor pré-selecionado (ou array de valores).
     * @param string $cat   Nome da Categoria da biblioteca. Se vazio ou não definido, retorna todas as bibliotecas que o cara pode acessar.
     * @return MastopFormSelectImage
     * @internal param int $size Número de Linhas. "1" dá um Select List normal de 1 opção.
     */
    public function __construct($caption, $name, $value = null, $cat = null)
    {
        parent::__construct($caption, $name, $value);
        $this->addOptGroupArray($this->getImageList($cat));
    }

    /**
     * Adiciona um Optgroup
     *
     * @param array|string $value opções do Grupo
     * @param string       $name  Nome do Grupo de Opções
     */
    public function addOptGroup($value = array(), $name = '&nbsp;')
    {
        $this->_optgroups[$name] = $value;
    }

    /**
     * Adiciona múltiplos Optgroups
     *
     * @param array $options Array com nome->opções
     */
    public function addOptGroupArray($options)
    {
        if (is_array($options)) {
            foreach ($options as $k => $v) {
                $this->addOptGroup($v, $k);
            }
        }
    }

    /**
     * @param null $cat
     *
     * @return array
     */
    public function getImageList($cat = null)
    {
        global $xoopsUser;
        $ret = array();
        if (!is_object($xoopsUser)) {
            $group = array(XOOPS_GROUP_ANONYMOUS);
        } else {
            $group = $xoopsUser->getGroups();
        }
        $imgcatHandler = xoops_getHandler('imagecategory');
        $catlist       = $imgcatHandler->getList($group, 'imgcat_read', 1);
        if (is_array($cat) && count($catlist) > 0) {
            foreach ($catlist as $k => $v) {
                if (!in_array($k, $cat)) {
                    unset($catlist[$k]);
                }
            }
        } elseif (is_int($cat)) {
            $catlist = array_key_exists($cat, $catlist) ? array($cat => $catlist[$cat]) : array();
        }
        $imageHandler = xoops_getHandler('image');
        foreach ($catlist as $k => $v) {
            $this->_optgroupsID[$v] = $k;
            $criteria               = new CriteriaCompo(new Criteria('imgcat_id', $k));
            $criteria->add(new Criteria('image_display', 1));
            $total = $imageHandler->getCount($criteria);
            if ($total > 0) {
                $imgcat    = $imgcatHandler->get($k);
                $storetype = $imgcat->getVar('imgcat_storetype');
                if ($storetype === 'db') {
                    $images = $imageHandler->getObjects($criteria, false, true);
                } else {
                    $images = $imageHandler->getObjects($criteria, false, false);
                }
                foreach ($images as $i) {
                    if ($storetype === 'db') {
                        $ret[$v]['/image.php?id=' . $i->getVar('image_id')] = $i->getVar('image_nicename');
                    } else {
                        $ret[$v]['/uploads/' . $i->getVar('image_name')] = $i->getVar('image_nicename');
                    }
                }
            } else {
                $ret[$v] = '';
            }
        }

        return $ret;
    }

    /**
     * Pega todos os Optgroups
     *
     * @return array Array com nome->opções
     */
    public function getOptGroups()
    {
        return $this->_optgroups;
    }

    /**
     * Pega todos os IDs dos Optgroups
     *
     * @return    array   Array com nome->ids
     */
    public function getOptGroupsID()
    {
        return $this->_optgroupsID;
    }

    /**
     * @return string
     */
    public function render()
    {
        global $xoopsUser;
        if (!is_object($xoopsUser)) {
            $group = array(XOOPS_GROUP_ANONYMOUS);
        } else {
            $group =& $xoopsUser->getGroups();
        }
        $imgcatHandler = xoops_getHandler('imagecategory');
        $catlist       = $imgcatHandler->getList($group, 'imgcat_write', 1);
        $catlist_total = count($catlist);
        $optIds        = $this->getOptGroupsID();
        $ret           = "<select onchange='if(this.options[this.selectedIndex].value != \"\"){ document.getElementById(\""
                         . $this->getName()
                         . '_img").src="'
                         . XOOPS_URL
                         . '"+this.options[this.selectedIndex].value;} else {document.getElementById("'
                         . $this->getName()
                         . '_img").src="'
                         . XOOPS_URL
                         . '/modules/'
                         . MGO_MOD_DIR
                         . "/assets/images/spager.gif\";}'  size='"
                         . $this->getSize()
                         . "'"
                         . $this->getExtra()
                         . '';
        if ($this->isMultiple() !== false) {
            $ret .= " name='" . $this->getName() . "[]' id='" . $this->getName() . "[]' multiple='multiple'>\n";
        } else {
            $ret .= " name='" . $this->getName() . "' id='" . $this->getName() . "'>\n";
        }
        $ret .= "<option value=''>" . _SELECT . "</option>\n";
        foreach ($this->getOptGroups() as $nome => $valores) {
            $ret .= '\n<optgroup id="img_cat_' . $optIds[$nome] . '" label="' . $nome . '">';
            if (is_array($valores)) {
                foreach ($valores as $value => $name) {
                    $ret .= "<option value='" . htmlspecialchars($value, ENT_QUOTES) . "'";
                    if (count($this->getValue()) > 0 && in_array($value, $this->getValue())) {
                        $ret    .= ' selected';
                        $imagem = $value;
                    }
                    $ret .= '>' . $name . "</option>\n";
                }
            }
            $ret .= '</optgroup>\n';
        }
        $browse_url = __DIR__ . '/formimage_browse.php';
        $browse_url = str_replace(XOOPS_ROOT_PATH, XOOPS_URL, $browse_url);
        $ret        .= '</select>';
        $ret        .= ($catlist_total > 0) ? " <input type='button' value='"
                                              . _ADDIMAGE
                                              . "' onclick=\"window.open('$browse_url?target="
                                              . $this->getName()
                                              . "','MastopFormImage','resizable=yes,width=500,height=470,left='+(screen.availWidth/2-200)+',top='+(screen.availHeight/2-200)+'');return false;\">" : '';
        $ret        .= "<br><img id='" . $this->getName() . "_img' src='" . ((!empty($imagem)) ? XOOPS_URL . $imagem : XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/assets/images/spacer.gif') . "'>";

        return $ret;
    }
}
