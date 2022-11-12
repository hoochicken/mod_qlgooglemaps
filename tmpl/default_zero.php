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

/** @var JRegistry $params */
/** @var stdClass $module */
/** @var int $clicksolution */
/** @var string $confirmtext */
/** @var bool $eprivacybutton  */
/** @var string $eprivacybuttonlabel  */
/** @var string $eprivacyItemId */
/** @var string $eprivacylinkRoute */
/** @var int $eprivacyReadText */
/** @var bool $eprivacyReadTextDisplay */
/** @var string $iframe_url */
/** @var string $iframe_attributes */
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

?>

<?php if ($infotextDisplay) : ?>
    <div class="info"><?php echo $infotext; ?></div>
<?php endif; ?>

<?php if ($eprivacybutton) : ?>
<div class="buttons">
    <button onclick="window.open('<?php echo $eprivacylinkRoute; ?>', '_blank')">
        <?php echo $eprivacybuttonlabel; ?>
    </button>
</div>
<?php endif; ?>

<div class="qlgooglemaps iframe_wrapper" id="qlgooglemaps_iframe_<?php echo $unique; ?>">
    <iframe id="qlgooglemaps_frame_<?php echo $unique; ?>" src="<?php echo $iframe_url; ?>" class="qlgooglemaps" style="border:0;" allowfullscreen></iframe>
</div>

