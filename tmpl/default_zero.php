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
/** @var string $module  */
/** @var string $confirmtext  */
/** @var string $eprivacyItemId  */
/** @var string $eprivacylinkRoute  */
/** @var string $url  */
/** @var string $unique  */
/** @var string $unique_key  */
/** @var string $qlgooglemaps_map id of igrame element  */
/** @var string $qlgooglemaps_button  */
/** @var string $qlgooglemaps_iframe  */
/** @var string $infotext  */
/** @var string $infotextDisplay  */
/** @var int $clicksolution  */

$url = $params->get('url', '');
// if no url given, wie won't display anything :-)
if (empty($url)) return;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\WebAsset\WebAssetManager;

$unique = uniqid();

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->registerStyle('qlgooglemaps', 'mod_qlgooglemaps/styles.css');
$wa->useStyle('qlgooglemaps');
?>
<?php if ($infotextDisplay) : ?>
    <div class="info"><?php echo $infotext; ?></div>
<?php endif; ?>

<?php if ($params->get('eprivacybutton', true)) : ?>
    <button onclick="window.open('<?php echo $eprivacylinkRoute; ?>', '_blank')"><?php echo $params->get('eprivacybuttonlabel', Text::_('MOD_QLGOOGLEMAPS_EPRIVACYBUTTON')); ?></button>
<?php endif; ?>

<div class="qlgooglemaps" id="module<?php echo $module->id ?>">
    <iframe id="qlgooglemaps_frame_<?php echo $unique; ?>" src="<?php echo $url; ?>" class="qlgooglemaps" style="border:0;" allowfullscreen></iframe>
</div>
