<?php
/**
 * @package		mod_qlgooglemaps
 * @copyright	Copyright (C) 2022 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;

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
/** @var bool $infotextDisplay  */
/** @var int $clicksolution  */
/** @var int $eprivacyReadText  */
/** @var bool $eprivacyReadTextDisplay  */
?>

<?php if ($eprivacyReadTextDisplay) : ?>
    <div class="eprivacyReadText">
        <input type="checkbox" value="1" name="qlgooglemaps_<?php echo $unique; ?>"/>
        <?php echo $eprivacyReadText; ?>
    </div>
<?php endif; ?>


<?php if ($infotextDisplay) : ?>
    <div class="info"><?php echo $infotext; ?></div>
<?php endif; ?>

<button onclick="qlgooglemapsLoadIframe('<?php echo $unique; ?>', '<?php echo $url; ?>', <?php echo $clicksolution; ?>, '<?php echo $confirmtext; ?>')"><?php echo $params->get('one_mapbuttonlabel', Text::_('MOD_QLGOOGLEMAPS_MAPBUTTONLABEL')); ?></button>

<?php if ($params->get('eprivacybutton', true)) : ?>
    <button onclick="window.open('<?php echo $eprivacylinkRoute; ?>', '_blank')"><?php echo $params->get('eprivacybuttonlabel', Text::_('MOD_QLGOOGLEMAPS_EPRIVACYBUTTON')); ?></button>
<?php endif; ?>

<div class="qlgooglemaps iframeHolder" id="qlgooglemaps_iframe_<?php echo $unique; ?>"></div>
