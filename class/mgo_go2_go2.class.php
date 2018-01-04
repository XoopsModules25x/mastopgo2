<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Classe para Manipulação de Destaques
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
###
### =============================================================

require_once XOOPS_ROOT_PATH . '/modules/' . MGO_MOD_DIR . '/class/mastopgeral.class.php';

/**
 * Class Mgo_go2_go2
 */
class Mgo_go2_go2 extends Mastop_geral
{
    /**
     * mgo_go2_go2 constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        $this->db     = XoopsDatabaseFactory::getDatabaseConnection();
        $this->tabela = $this->db->prefix(MGO_MOD_TABELA1);
        $this->id     = 'go2_10_id';
        $this->initVar('go2_10_id', XOBJ_DTYPE_INT, 0);
        $this->initVar('sec_10_id', XOBJ_DTYPE_INT, 0);
        $this->initVar('go2_30_nome', XOBJ_DTYPE_TXTBOX);
        $this->initVar('go2_30_link', XOBJ_DTYPE_URL);
        $this->initVar('go2_11_target', XOBJ_DTYPE_INT, 0);
        $this->initVar('go2_30_imagem', XOBJ_DTYPE_TXTBOX);
        $this->initVar('go2_10_acessos', XOBJ_DTYPE_INT, 0);
        $this->initVar('go2_12_ativo', XOBJ_DTYPE_INT, 1);

        if (!empty($id)) {
            if (is_array($id)) {
                $this->assignVars($id);
            } else {
                $this->load((int)$id);
            }
        }
    }

    /**
     * @return bool
     */
    public function ativar()
    {
        $sql = 'UPDATE ' . $this->tabela . ' SET go2_12_ativo=1 WHERE ' . $this->id . '=' . $this->getVar($this->id);
        if (!$result = $this->db->queryF($sql)) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function desativar()
    {
        $sql = 'UPDATE ' . $this->tabela . ' SET go2_12_ativo=0 WHERE ' . $this->id . '=' . $this->getVar($this->id);
        if (!$result = $this->db->queryF($sql)) {
            return false;
        }

        return true;
    }

    /**
     * @param bool $html
     *
     * @return string
     */
    public function pegaImagem($html = false)
    {
        return (!$html) ? XOOPS_URL . $this->getVar('go2_30_imagem') : "<img src='" . XOOPS_URL . $this->getVar('go2_30_imagem') . "' alt='" . $this->getVar('go2_30_nome') . "' class='full'>";
    }

    /**
     * @param bool $imagem
     * @param bool $html
     *
     * @return string
     */
    public function pegaLink($imagem = false, $html = true)
    {
        if (!$html) {
            if ('' === $this->getVar('go2_30_link')) {
            } else {
                return XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/go2.php?tac=' . $this->getVar($this->id);
            }
        } else {
            if (!$imagem) {
                if (0 == $this->getVar('go2_11_target')) {
                    return "<a href='" . XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/go2.php?tac=' . $this->getVar($this->id) . "' title='" . $this->getVar('go2_30_nome') . "'>" . $this->getVar('go2_30_link') . '</a>';
                } else {
                    return "<a href='" . XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/go2.php?tac=' . $this->getVar($this->id) . "' title='" . $this->getVar('go2_30_nome') . "' target='_blank'>" . $this->getVar('go2_30_link') . '</a>';
                }
            } else {
                if (0 == $this->getVar('go2_11_target')) {
                    return "<a href='" . XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/go2.php?tac=' . $this->getVar($this->id) . "' title='" . $this->getVar('go2_30_nome') . "'>" . $this->pegaImagem(true) . '</a>';
                } else {
                    return "<a href='" . XOOPS_URL . '/modules/' . MGO_MOD_DIR . '/go2.php?tac=' . $this->getVar($this->id) . "' title='" . $this->getVar('go2_30_nome') . "' target='_blank'>" . $this->pegaImagem(true) . '</a>';
                }
            }
        }
    }

    /**
     * @return bool
     */
    public function atualizaCount()
    {
        $sql = 'UPDATE ' . $this->tabela . ' SET go2_10_acessos=go2_10_acessos+1 WHERE ' . $this->id . '=' . $this->getVar($this->id);
        if (!$result = $this->db->queryF($sql)) {
            return false;
        }

        return true;
    }
}
