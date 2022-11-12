<?php
/**
 * @package        mod_qlgooglemaps
 * @copyright    Copyright (C) 2022 ql.de All rights reserved.
 * @author        Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/** @var $params JRegistry */
$iframe_url = $params->get('iframe_url', '');
$iframe_attributes = str_replace('"', '\'', addslashes($params->get('iframe_attributes', '')));

// if no url given, wie won't display anything :-)
if (empty($iframe_url)) return;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\WebAsset\WebAssetManager;

/** @var $module stdClass */
require_once dirname(__FILE__) . '/helper.php';
$obj_helper = new modQlgooglemapsHelper($module, $params);

$confirmtext = $params->get('one_confirmtext', '');
$eprivacyItemId = $params->get('eprivacyItemId', false);
$eprivacylinkRoute = JRoute::_('index.php?Itemid=' . $eprivacyItemId);

$clicksolution = (int) $params->get('clicksolution', 0);
$confirmtext = $params->get('confirmtext', '');

$eprivacyReadText = $params->get('eprivacyReadText', Text::_('MOD_QLGOOGLEMAPS_EPRIVACYREADTEXT'));
$eprivacyReadTextDisplay = !empty(strip_tags($eprivacyReadText));

$scripts_afterclickloaded = $params->get('scripts_afterclickloaded', '');

$infotext = $params->get('info', '');
$infotextDisplay = !empty(strip_tags($infotext));

$iframeButtonDisabled = $clicksolution >= 3;

$unique = uniqid();
$unique_key = 'qlgooglemaps_' . $unique;
$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
// $wa->addInlineScript(sprintf('<script>let mapId = "%s"; let uniquefier = "%s"; let url = "%s"; let confirmtext = "%s"; </script>', $unique_key, $unique, $url, $confirmtext));
$wa->registerStyle('mod_qlgooglemaps', 'mod_qlgooglemaps/styles.css');
$wa->useStyle('mod_qlgooglemaps');
$wa->registerScript('mod_qlgooglemaps', 'mod_qlgooglemaps/script.js');
$wa->useScript('mod_qlgooglemaps');

require JModuleHelper::getLayoutPath('mod_qlgooglemaps', $params->get('layout', 'default'));
