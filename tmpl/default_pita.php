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
/** @var stdClass $module */
/** @var int $clicksolution */
/** @var string $confirmtext */
/** @var string $eprivacyItemId */
/** @var string $eprivacylinkRoute */
/** @var int $eprivacyReadText */
/** @var bool $eprivacyReadTextDisplay */
/** @var string $iframe_url */
/** @var string $iframe_attributes */
/** @var string $infotext */
/** @var bool $infotextDisplay */
/** @var string $qlgooglemaps_map id of igrame element */
/** @var string $qlgooglemaps_button */
/** @var string $qlgooglemaps_iframe */
/** @var string $scripts_afterclickloaded */
/** @var string $pitatexts */
/** @var string $unique */
/** @var string $unique_key */

$onclick = 'qlgooglemapsLoadIframePitaClickSolution(\'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\')';
$onclick = sprintf($onclick, $unique, $iframe_url, $iframe_attributes, $scripts_afterclickloaded, $confirmtext, $pitatexts);
?>

<?php if ($infotextDisplay) : ?>
    <div class="info"><?php echo $infotext; ?></div>
<?php endif; ?>

<?php if ($params->get('eprivacybutton', true)) : ?>
    <button onclick="window.open('<?php echo $eprivacylinkRoute; ?>', '_blank')"><?php echo $params->get('eprivacybuttonlabel', Text::_('MOD_QLGOOGLEMAPS_EPRIVACYBUTTON')); ?></button>
<?php endif; ?>

<div class="eprivacyReadText">
    <input type="checkbox" value="1" onchange="qlgooglemapsEnableButton('<?php echo $unique; ?>')" name="qlgooglemaps_readeprivacy_<?php echo $unique; ?>" id="qlgooglemaps_readeprivacy_<?php echo $unique; ?>"/>
    <label for="qlgooglemaps_readeprivacy_<?php echo $unique; ?>"><?php echo $eprivacyReadText; ?></label>
</div>

<button disabled id="qlgooglemaps_button_<?php echo $unique; ?>" onclick="<?php echo $onclick; ?>">
    <?php echo $params->get('one_mapbuttonlabel', Text::_('MOD_QLGOOGLEMAPS_MAPBUTTONLABEL')); ?>
</button>

<div class="qlgooglemaps iframe_wrapper" id="qlgooglemaps_iframe_<?php echo $unique; ?>"></div>
