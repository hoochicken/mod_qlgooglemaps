<?php
/**
 * @package		mod_qlgooglemaps
 * @copyright	Copyright (C) 2020 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::stylesheet('mod_qlgooglemaps/styles.css', array(), true);
JHtml::script("mod_qlgooglemaps/script.js", false, true);
?>

<div class="qlmaps" id="module<?php echo $module->id ?>">
</div>