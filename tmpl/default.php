<?php
/**
 * @package		mod_qlgooglemaps
 * @copyright	Copyright (C) 2022 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
use Joomla\CMS\Language\Text;defined('_JEXEC') or die;
JHtml::stylesheet('mod_qlgooglemaps/styles.css', array(), true);
JHtml::script("mod_qlgooglemaps/script.js", false, true);

/** @var $params JRegistry */
/** @var $module stdClass */

$map_url = $params->get('mapurl');
?>
<script>
    <?php $unique = rand(1, 1000); ?>;
    let mapId = 'gmframe<?php echo $unique; ?>';
    let datenschutzId = 'datenschutz<?php echo $unique; ?>';
    document.getElementById(mapId).src = '';

    function loadIframeSrc()
    {
      if (!confirm('<?php echo Text::_('MOD_QLGOOGLEMAPS_POPUP'); ?>')) {
        document.getElementById(mapId).src = '';
        document.getElementById(mapId).style.display = 'none';
        return false;
      }
      document.getElementById(datenschutzId).disabled = 'disabled';
      document.getElementById(mapId).src = '<?php echo $map_url; ?>';
      document.getElementById(mapId).style.display = 'block';
    }
</script>

<div class="qlmaps" id="module<?php echo $module->id ?>">

    <input class="form-control" type="checkbox" name="datenschutz<?php echo $unique; ?>" id="datenschutz<?php echo $unique; ?>" value="1" onChange="if(this.checked)document.getElementById('buttonMap<?php echo $unique; ?>').disabled = false; else document.getElementById('buttonMap<?php echo $unique; ?>').disabled = 'disabled';" style="display:inline-block;float:left;width:5%;margin-top:8px;">
    <label for="datenschutz<?php echo $unique; ?>" style="display:inline-block;float:left;width:90%;"><?php echo Text::_('MOD_QLGOOGLEMAPS_CONSENT'); ?></label>

    <br />
    <button class="btn btn-primary" id="buttonMap<?php echo $unique; ?>" onclick="loadIframeSrc(); return false;" disabled><?php echo Text::_('MOD_QLGOOGLEMAPS_BUTTON'); ?></button>

    <iframe id="gmframe<?php echo $unique; ?>" src="" class="googlemaps" frameborder="0" style="border:0; display:none;" allowfullscreen></iframe>



</div>