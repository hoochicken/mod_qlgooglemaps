<?php
/**
 * @package		mod_qlqlgooglemaps
 * @copyright	Copyright (C) 2022 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
use Joomla\CMS\Language\Text;
use Joomla\CMS\WebAsset\WebAssetManager;

defined('_JEXEC') or die;

class modQlgooglemapsHelper
{
    public $module;
    public $params;
    public $wa;

	function __construct($module, $params, $wa)
    {
        $this->module = $module;
        $this->params = $params;
        $this->wa = $wa;
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
        $eprivacybutton = (bool) $params->get('eprivacybutton', false);
        $eprivacybuttonlabel = $params->get('eprivacybuttonlabel', Text::_('MOD_QLGOOGLEMAPS_EPRIVACYBUTTON'));
        $eprivacyItemId = $params->get('eprivacyItemId', false);
        $eprivacylinkRoute = JRoute::_('index.php?Itemid=' . $eprivacyItemId);
        $eprivacyReadText = $this->getTextByParamOrLanguageOverride('eprivacyReadText', Text::_('MOD_QLGOOGLEMAPS_EPRIVACYREADTEXTDEFAULT'));
        $eprivacyReadTextDisplay = !empty(strip_tags($eprivacyReadText));
        $iframe_url = $params->get('iframe_url', '');
        $iframe_attributes = str_replace('"', '\'', addslashes($params->get('iframe_attributes', '')));
        $infotext = $params->get('info', '');
        $infotextDisplay = !empty(strip_tags($infotext));
        $iframebuttonlabel = $this->getTextByParamOrLanguageOverride('iframebuttonlabel', Text::_('MOD_QLGOOGLEMAPS_IFRAMEBUTTONLABELDEFAULT'));
        $iframebuttonDisabled = (3 <= $clicksolution) ? 'disabled' : '';
        $pitatexts = str_replace(["\n", "\r", '~~~~'], '~~', $params->get('pitatexts', ''));
        $scripts_afterclickloaded = $params->get('scripts_afterclickloaded', '');
        $unique = uniqid();
        $unique_key = 'qlgooglemaps_' . $unique;

        return [
            'clicksolution' => $clicksolution,
            'confirmtext' => $confirmtext,
            'eprivacybutton' => $eprivacybutton,
            'eprivacybuttonlabel' => $eprivacybuttonlabel,
            'eprivacyItemId' => $eprivacyItemId,
            'eprivacylinkRoute' => $eprivacylinkRoute,
            'eprivacyReadText' => $eprivacyReadText,
            'eprivacyReadTextDisplay' => $eprivacyReadTextDisplay,
            'iframe_url' => $iframe_url,
            'iframe_attributes' => $iframe_attributes,
            'infotext' => $infotext,
            'infotextDisplay' => $infotextDisplay,
            'iframebuttonDisabled' => $iframebuttonDisabled,
            'iframebuttonlabel' => $iframebuttonlabel,
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

    public function addStylesAndScripts($clicksolution, $scripts = '')
    {
        $this->wa->registerStyle('mod_qlgooglemaps', 'mod_qlgooglemaps/styles.css');
        $this->wa->useStyle('mod_qlgooglemaps');
        $this->wa->registerScript('mod_qlgooglemaps', 'mod_qlgooglemaps/script.js');
        $this->wa->useScript('mod_qlgooglemaps');

        if (!empty(trim($scripts)) && 0 === $clicksolution) {
            $this->wa->registerScript('mod_qlgooglemaps', 'mod_qlgooglemaps/script.js');
            $this->wa->useScript('mod_qlgooglemaps');
        }
    }
}
