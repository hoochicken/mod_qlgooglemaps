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
/** @var $module stdClass */

require_once dirname(__FILE__) . '/helper.php';
$obj_helper = new modQlgooglemapsHelper($module, $params);

require JModuleHelper::getLayoutPath('mod_qlgooglemaps', $params->get('layout', 'default'));
