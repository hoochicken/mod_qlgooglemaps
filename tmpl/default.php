<?php
/**
 * @package		mod_qlgooglemaps
 * @copyright	Copyright (C) 2022 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// no direct access
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\WebAsset\WebAssetManager;

/** @var JRegistry $params */
/** @var stdClass $module */
/** @var int $clicksolution */
/** @var string $confirmtext */
/** @var bool $privacybutton  */
/** @var string $privacybuttonlabel  */
/** @var string $privacyItemId */
/** @var string $privacylinkRoute */
/** @var int $privacyReadText */
/** @var bool $privacyReadTextDisplay */
/** @var string $iframe_url */
/** @var string $iframe_attributes */
/** @var string $iframebuttonDisabled disabled | ''*/
/** @var string $image */
/** @var string $imageSrcAttribute */
/** @var string $infotext */
/** @var bool $infotextDisplay */
/** @var string $iframebuttonlabel */
/** @var string $qlgooglemaps_map id of igrame element */
/** @var string $qlgooglemaps_button */
/** @var string $qlgooglemaps_iframe */
/** @var string $scripts_afterclickloaded */
/** @var string $pitatexts */
/** @var string $unique */
/** @var string $unique_key */

// onclick event
$onclick = 'qlgooglemapsLoadIframe%sClickSolution(\'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\')';
$onclick = sprintf($onclick, $clicksolution, $unique, $iframe_url, $iframe_attributes, $scripts_afterclickloaded, $confirmtext, $pitatexts);
?>
<div class="qlgooglemaps">
    <?php if ($infotextDisplay) : ?>
        <div class="info"><?php echo $infotext; ?></div>
    <?php endif; ?>

    <?php if (3 <= $clicksolution) : ?>
        <div class="privacyReadText">
            <input type="checkbox" value="1" onchange="qlgooglemapsEnableButton('<?php echo $unique; ?>')" name="qlgooglemaps_readprivacy_<?php echo $unique; ?>" id="qlgooglemaps_readprivacy_<?php echo $unique; ?>"/>
            <label for="qlgooglemaps_readprivacy_<?php echo $unique; ?>"><?php echo $privacyReadText; ?></label>
        </div>
    <?php endif; ?>
    <div class="buttons">
        <?php if ($privacybutton) : ?>
            <button onclick="window.open('<?php echo $privacylinkRoute; ?>', '_blank')">
                <?php echo $privacybuttonlabel; ?>
            </button>
        <?php endif; ?>

        <?php if (1 <= $clicksolution && empty($image)) : ?>
            <button <?php echo $iframebuttonDisabled; ?> id="qlgooglemaps_button_<?php echo $unique; ?>" onclick="<?php echo $onclick; ?>" class="qlgooglemaps_button">
                <?php echo $iframebuttonlabel; ?>
            </button>
        <?php endif; ?>
    </div>

    <div class="qlgooglemaps iframe_wrapper" id="qlgooglemaps_iframe_<?php echo $unique; ?>">
        <?php if (1 <= $clicksolution && !empty($image)) : ?>
            <input <?php echo $iframebuttonDisabled; ?> type="image" <?php echo $imageSrcAttribute; ?>  id="qlgooglemaps_button_image_<?php echo $unique; ?>" onclick="<?php echo $onclick; ?>" class="qlgooglemaps_button" />
        <?php endif; ?>
        <?php if (0 === $clicksolution) : ?>
            <iframe id="qlgooglemaps_frame_<?php echo $unique; ?>" src="<?php echo $iframe_url; ?>" class="qlgooglemaps" style="border:0;" allowfullscreen></iframe>
        <?php endif; ?>
    </div>
</div>
