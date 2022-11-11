<?php
/**
 * @package		mod_qlgooglemaps
 * @copyright	Copyright (C) 2022 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;

/** @var WebAssetManager $wa */
/** @var JRegistry $params */
/** @var stdClass $module  */
$url = $params->get('url', '');
// if no url given, wie won't display anything :-)
if (empty($url)) return;

use Joomla\CMS\Factory;
use Joomla\CMS\WebAsset\WebAssetManager;

$unique = uniqid();

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->registerStyle('qlgooglemaps', 'mod_qlgooglemaps/styles.css');
$wa->useStyle('qlgooglemaps');
$wa->registerScript('qlgooglemaps', 'mod_qlgooglemaps/script.js');
$wa->useScript('qlgooglemaps');
?>
<div class="qlgooglemaps" id="module<?php echo $module->id ?>">
    <iframe id="qlgooglemaps_frame_<?php echo $unique; ?>" src="<?php echo $url; ?>" class="qlgooglemaps" style="border:0;" allowfullscreen></iframe>
</div>
