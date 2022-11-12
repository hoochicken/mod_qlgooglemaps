<?php
/**
 * @package		mod_qlqlgooglemaps
 * @copyright	Copyright (C) 2022 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;

class modQlgooglemapsHelper
{
    public $params;
    public $module;

	function __construct($module,$params)
    {
        $this->module=$module;
        $this->params=$params;
    }

    /**
     * initiating parameters into useful variables
     * @return array
     */
    public function initiateParams()
    {
        $params = $this->params;

        $clicksolution = (int) $params->get('clicksolution', 0);
        $confirmtext = $this->getTextByParamOrLanguageOverride('confirmtext', Text::_('MOD_QLGOOGLEMAPS_CONFIRMTEXTDEFAULT'));
        $eprivacyItemId = $params->get('eprivacyItemId', false);
        $eprivacylinkRoute = JRoute::_('index.php?Itemid=' . $eprivacyItemId);
        $eprivacyReadText = $this->getTextByParamOrLanguageOverride('eprivacyReadText', Text::_('MOD_QLGOOGLEMAPS_EPRIVACYREADTEXTDEFAULT'));
        $eprivacyReadTextDisplay = !empty(strip_tags($eprivacyReadText));
        $iframe_url = $params->get('iframe_url', '');
        $iframe_attributes = str_replace('"', '\'', addslashes($params->get('iframe_attributes', '')));
        $infotext = $params->get('info', '');
        $infotextDisplay = !empty(strip_tags($infotext));
        $pitatexts = str_replace(["\n", "\r", '~~~~'], '~~', $params->get('pitatexts', ''));
        $scripts_afterclickloaded = $params->get('scripts_afterclickloaded', '');
        $unique = uniqid();
        $unique_key = 'qlgooglemaps_' . $unique;

        return [
            'clicksolution' => $clicksolution,
            'confirmtext' => $confirmtext,
            'eprivacyItemId' => $eprivacyItemId,
            'eprivacylinkRoute' => $eprivacylinkRoute,
            'eprivacyReadText' => $eprivacyReadText,
            'eprivacyReadTextDisplay' => $eprivacyReadTextDisplay,
            'iframe_url' => $iframe_url,
            'iframe_attributes' => $iframe_attributes,
            'infotext' => $infotext,
            'infotextDisplay' => $infotextDisplay,
            'pitatexts' => $pitatexts,
            'scripts_afterclickloaded' => $scripts_afterclickloaded,
            'unique' => $unique,
            'unique_key' => $unique_key,
            ];
	}

    /**
     * returns parameter value
     * if parameter value is empty, default is returned
     * if parameter value is a jtext PLACEHOLDER for language override, this language override is returned
     * @param string $parameterName
     * @param string $default
     * @return string
     */
    private function getTextByParamOrLanguageOverride(string $parameterName, string $default = '')
    {
        $value = $this->params->get($parameterName, $default);
        $keyLanguage = trim(strip_tags($value));
        $valueLanguage = Text::_($keyLanguage);
        if ($keyLanguage !== $valueLanguage) $value = $valueLanguage;
        return $value;
    }
}
