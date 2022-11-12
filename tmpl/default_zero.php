<?php
/**
 * @package		mod_qlgooglemaps
 * @copyright	Copyright (C) 2022 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\WebAsset\WebAssetManager;

/** @var WebAssetManager $wa */
/** @var JRegistry $params */
/** @var stdClass $module  */
/** @var string $module  */
/** @var string $confirmtext  */
/** @var string $eprivacyItemId  */
/** @var string $eprivacylinkRoute  */
/** @var string $iframe_url  */
/** @var string $unique  */
/** @var string $unique_key  */
/** @var string $qlgooglemaps_map id of igrame element  */
/** @var string $qlgooglemaps_button  */
/** @var string $qlgooglemaps_iframe  */
/** @var string $infotext  */
/** @var string $infotextDisplay  */
/** @var int $clicksolution  */
/** @var string $scripts_afterclickloaded  */

// custom scripts are only loaded directly
if (!empty(trim($scripts_afterclickloaded))) $wa->registerScript('mod_qlgooglemaps', $scripts_afterclickloaded);
?>
<?php if ($infotextDisplay) : ?>
    <div class="info"><?php echo $infotext; ?></div>
<?php endif; ?>

<?php if ($params->get('eprivacybutton', true)) : ?>
    <button onclick="window.open('<?php echo $eprivacylinkRoute; ?>', '_blank')"><?php echo $params->get('eprivacybuttonlabel', Text::_('MOD_QLGOOGLEMAPS_EPRIVACYBUTTON')); ?></button>
<?php endif; ?>

<div class="qlgooglemaps" id="module<?php echo $module->id ?>">
    <iframe id="qlgooglemaps_frame_<?php echo $unique; ?>" src="<?php echo $iframe_url; ?>" class="qlgooglemaps" style="border:0;" allowfullscreen></iframe>
</div>
