<?php
/**
 * @copyright  XOOPS Project (http://xoops.org)
 * @license    GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package    MastopGo2
 * @since
 * @author     XOOPS Development Team
 */

include_once __DIR__ . '/admin_header.php';

xoops_cp_header();

$aboutAdmin = new ModuleAdmin();

echo $aboutAdmin->addNavigation(basename(__FILE__));
echo $aboutAdmin->renderAbout('xoopsfoundation@gmail.com', false);

include_once __DIR__ . '/admin_footer.php';
