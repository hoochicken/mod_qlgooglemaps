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

/** @var $module stdClass */
/** @var $params JRegistry */

switch ($params->get('clicksolution', 'zero')) {
    case 100:
        $path = JModuleHelper::getLayoutPath('mod_qlgooglemaps', $params->get('layout', 'default') . '_pita');
        require $path;
        break;
    case 3:
        $path = JModuleHelper::getLayoutPath('mod_qlgooglemaps', $params->get('layout', 'default') . '_three');
        require $path;
        break;
    case 2:
        $path = JModuleHelper::getLayoutPath('mod_qlgooglemaps', $params->get('layout', 'default') . '_two');
        require $path;
        break;
    case 1:
        $path = JModuleHelper::getLayoutPath('mod_qlgooglemaps', $params->get('layout', 'default') . '_one');
        require $path;
        break;
    case 0:
    default:
        $path = JModuleHelper::getLayoutPath('mod_qlgooglemaps', $params->get('layout', 'default') . '_zero');
        require $path;
}
