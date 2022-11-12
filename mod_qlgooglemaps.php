<?php
/**
 * @package        mod_qlgooglemaps
 * @copyright    Copyright (C) 2022 ql.de All rights reserved.
 * @author        Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\WebAsset\WebAssetManager;

/** @var $params JRegistry */
/** @var $module stdClass */

require_once dirname(__FILE__) . '/helper.php';
$obj_helper = new modQlgooglemapsHelper($module, $params);
$array = $obj_helper->initiateParams();
extract($array);

// if no url given, wie won't display anything :-)
if (empty($iframe_url)) return;

// add styles to DOM and scripts as well
$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->registerStyle('mod_qlgooglemaps', 'mod_qlgooglemaps/styles.css');
$wa->useStyle('mod_qlgooglemaps');
$wa->registerScript('mod_qlgooglemaps', 'mod_qlgooglemaps/script.js');
$wa->useScript('mod_qlgooglemaps');

require JModuleHelper::getLayoutPath('mod_qlgooglemaps', $params->get('layout', 'default'));
