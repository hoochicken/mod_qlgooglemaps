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
/** @var string $iframe_url  */
/** @var string $iframe_attributes */
/** @var string $unique  */
/** @var string $unique_key  */
/** @var string $qlgooglemaps_map id of igrame element  */
/** @var string $qlgooglemaps_button  */
/** @var string $qlgooglemaps_iframe  */
/** @var string $infotext  */
/** @var string $scripts_afterclickloaded */
/** @var string $iframe_attributes */
/** @var bool $infotextDisplay  */
/** @var int $clicksolution  */
/** @var int $eprivacyReadText  */
/** @var bool $eprivacyReadTextDisplay  */
/** @var bool $iframeButtonDisabled */
?>

<?php if ($infotextDisplay) : ?>
    <div class="info"><?php echo $infotext; ?></div>
<?php endif; ?>

<?php if ($eprivacyReadTextDisplay) : ?>
    <div class="eprivacyReadText">
        <input type="checkbox" value="1" onchange="qlgooglemapsEnableButton('<?php echo $unique; ?>')" name="qlgooglemaps_readeprivacy_<?php echo $unique; ?>" id="qlgooglemaps_readeprivacy_<?php echo $unique; ?>"/>
        <label for="qlgooglemaps_readeprivacy_<?php echo $unique; ?>"><?php echo $eprivacyReadText; ?></label>
    </div>
<?php endif; ?>

<button id="qlgooglemaps_button_<?php echo $unique; ?>" <?php if ($iframeButtonDisabled) echo 'disabled'; ?> onclick="qlgooglemapsLoadIframe(
  '<?php echo $unique; ?>',
  '<?php echo $iframe_url; ?>',
  '<?php echo $scripts_afterclickloaded; ?>',
  <?php echo $clicksolution; ?>,
  '<?php echo $confirmtext; ?>',
  '<?php echo $iframe_attributes; ?>')"><?php echo $params->get('one_mapbuttonlabel', Text::_('MOD_QLGOOGLEMAPS_MAPBUTTONLABEL')); ?></button>

<?php if ($params->get('eprivacybutton', true)) : ?>
    <button onclick="window.open('<?php echo $eprivacylinkRoute; ?>', '_blank')"><?php echo $params->get('eprivacybuttonlabel', Text::_('MOD_QLGOOGLEMAPS_EPRIVACYBUTTON')); ?></button>
<?php endif; ?>

<div class="qlgooglemaps iframeHolder" id="qlgooglemaps_iframe_<?php echo $unique; ?>"></div>

<!--iframe src="https://player.vimeo.com/video/769069809?h=f1daa2ff03&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe-->
