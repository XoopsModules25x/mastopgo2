<?php
### =============================================================
### Mastop InfoDigital - Paixão por Internet
### =============================================================
### Header com includes padrões para a Admin do Módulo
### =============================================================
### Developer: Fernando Santos (topet05), fernando@mastop.com.br
### Copyright: Mastop InfoDigital © 2003-2007
### -------------------------------------------------------------
### www.mastop.com.br
### =============================================================
###
### =============================================================

global $pathIcon32;
echo "<div class='adminfooter'>\n"
     . "  <div style='text-align: center;'>\n"
     . "    <a href='http://xoops.org' rel='external'><img src='{$pathIcon32}/xoopsmicrobutton.gif' alt='XOOPS' title='XOOPS'></a>\n"
     . "  </div>\n"
     . '  '
     . _AM_MODULEADMIN_ADMIN_FOOTER
     . "\n"
     . '</div>';

xoops_cp_footer();
