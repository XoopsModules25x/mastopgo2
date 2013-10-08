<?PHP
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
### $Id: mgo_go2_go2.class.php 10471 2012-12-19 10:31:08Z beckmi $
### =============================================================
include_once XOOPS_ROOT_PATH."/modules/".MGO_MOD_DIR."/class/mastop_geral.class.php";
class mgo_go2_go2 extends mastop_geral {
    function mgo_go2_go2($id=null){
        $this->db =& XoopsDatabaseFactory::getDatabaseConnection();
        $this->tabela = $this->db->prefix(MGO_MOD_TABELA1);
        $this->id = "go2_10_id";
        $this->initVar("go2_10_id", XOBJ_DTYPE_INT);
        $this->initVar("sec_10_id", XOBJ_DTYPE_INT);
        $this->initVar("go2_30_nome", XOBJ_DTYPE_TXTBOX);
        $this->initVar("go2_30_link", XOBJ_DTYPE_URL);
        $this->initVar("go2_11_target", XOBJ_DTYPE_INT, 0);
        $this->initVar("go2_30_imagem", XOBJ_DTYPE_TXTBOX);
        $this->initVar("go2_10_acessos", XOBJ_DTYPE_INT);
        $this->initVar("go2_12_ativo", XOBJ_DTYPE_INT, 1);
        if ( !empty($id) ) {
            if ( is_array($id) ) {
                $this->assignVars($id);
            } else {
                $this->load(intval($id));
            }
        }

    }
    function ativar(){
        $sql = 'UPDATE '.$this->tabela.' SET go2_12_ativo=1 WHERE '.$this->id.'='.$this->getVar($this->id);
        if (!$result = $this->db->queryF($sql)) {
            return false;
        }
        return true;
    }

    function desativar(){
        $sql = 'UPDATE '.$this->tabela.' SET go2_12_ativo=0 WHERE '.$this->id.'='.$this->getVar($this->id);
        if (!$result = $this->db->queryF($sql)) {
            return false;
        }
        return true;
    }
    function pegaImagem($html = false) {
        return (!$html) ? XOOPS_URL.$this->getVar("go2_30_imagem") : "<img src='".XOOPS_URL.$this->getVar("go2_30_imagem")."' alt='".$this->getVar("go2_30_nome")."' class='full'>";
    }
    function pegaLink($imagem = false, $html = true){
        if (!$html) {
            if ($this->getVar("go2_30_link") == '') {
            }
            else
            {
            return XOOPS_URL."/modules/".MGO_MOD_DIR."/go2.php?tac=".$this->getVar($this->id);
            }
        }else{
            if (!$imagem) {
                if ($this->getVar("go2_11_target") == 0) {
                    return "<a href='".XOOPS_URL."/modules/".MGO_MOD_DIR."/go2.php?tac=".$this->getVar($this->id)."' title='".$this->getVar("go2_30_nome")."'>".$this->getVar("go2_30_link")."</a>";
                }else{
                    return "<a href='".XOOPS_URL."/modules/".MGO_MOD_DIR."/go2.php?tac=".$this->getVar($this->id)."' title='".$this->getVar("go2_30_nome")."' target='_blank'>".$this->getVar("go2_30_link")."</a>";
                }
            }else{
                if ($this->getVar("go2_11_target") == 0) {
                    return "<a href='".XOOPS_URL."/modules/".MGO_MOD_DIR."/go2.php?tac=".$this->getVar($this->id)."' title='".$this->getVar("go2_30_nome")."'>".$this->pegaImagem(true)."</a>";
                }else{
                    return "<a href='".XOOPS_URL."/modules/".MGO_MOD_DIR."/go2.php?tac=".$this->getVar($this->id)."' title='".$this->getVar("go2_30_nome")."' target='_blank'>".$this->pegaImagem(true)."</a>";
                }
            }
        }

    }
    function atualizaCount(){
        $sql = 'UPDATE '.$this->tabela.' SET go2_10_acessos=go2_10_acessos+1 WHERE '.$this->id.'='.$this->getVar($this->id);
        if (!$result = $this->db->queryF($sql)) {
            return false;
        }
        return true;
    }
}