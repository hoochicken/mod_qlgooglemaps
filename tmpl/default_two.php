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
/** @var bool $eprivacybutton */
/** @var string $eprivacybuttonlabel  */
/** @var string $eprivacyItemId */
/** @var string $eprivacylinkRoute */
/** @var int $eprivacyReadText */
/** @var bool $eprivacyReadTextDisplay */
/** @var string $iframe_url */
/** @var string $iframe_attributes */
/** @var string $infotext */
/** @var bool $infotextDisplay */
/** @var string $mapbuttonlabel */
/** @var string $qlgooglemaps_map id of igrame element */
/** @var string $qlgooglemaps_button */
/** @var string $qlgooglemaps_iframe */
/** @var string $scripts_afterclickloaded */
/** @var string $pitatexts */
/** @var string $unique */
/** @var string $unique_key */

$onclick = 'qlgooglemapsLoadIframe2ClickSolution(\'%s\', \'%s\', \'%s\', \'%s\', \'%s\')';
$onclick = sprintf($onclick, $unique, $iframe_url, $iframe_attributes, $scripts_afterclickloaded, $confirmtext);
?>

<?php if ($infotextDisplay) : ?>
    <div class="info"><?php echo $infotext; ?></div>
<?php endif; ?>

<div class="buttons">
    <?php if ($eprivacybutton) : ?>
        <button onclick="window.open('<?php echo $eprivacylinkRoute; ?>', '_blank')">
            <?php echo $eprivacybuttonlabel; ?>
        </button>
    <?php endif; ?>

    <button id="qlgooglemaps_button_<?php echo $unique; ?>" onclick="<?php echo $onclick; ?>" class="qlgooglemaps_button">
        <?php echo $mapbuttonlabel; ?>
    </button>
</div>

<div class="qlgooglemaps iframe_wrapper" id="qlgooglemaps_iframe_<?php echo $unique; ?>"></div>
