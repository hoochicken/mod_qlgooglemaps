/*
@package		mod_qlgooglemaps
@copyright	Copyright (C) 2022 ql.de All rights reserved.
@author 		Mareike Riegel mareike.riegel@ql.de
@license		GNU General Public License version 2 or later; see LICENSE.txt
*/

/**
 *
 * @param string uniquefier                unique addition to id, to tell one iframe from the other in the same page
 * @param string iframe_url                url of iframe, 'https://...
 * @param string scripts_afterclickloaded  scripts to be loaded after last click
 * @param string iframe_attributes         attributes for iframe
 * @returns {boolean}
 */
function qlgooglemapsLoadIframe1ClickSolution(uniquefier, iframe_url, iframe_attributes = '', scripts_afterclickloaded='')
{
  // get id of iframe
  let iframeId = 'qlgooglemaps_iframe_' + uniquefier;

  // some scripte need to be loaded aditionally to iframe
  // e. g. vimeo needs this whyever
  qlgooglemapsAddScriptToDoms(scripts_afterclickloaded);
  qlgooglemapsHideImagebutton(uniquefier);

  // build iframe html, actually add the html of the iframe
  let htmlIframe = qlgooglemapsGetIframeHtml(iframe_url, iframe_attributes);
  document.getElementById(iframeId).insertAdjacentHTML('beforeend', htmlIframe);
}

/**
 *
 * @param string uniquefier                unique addition to id, to tell one iframe from the other in the same page
 * @param string iframe_url                url of iframe, 'https://...
 * @param string scripts_afterclickloaded  scripts to be loaded after last click
 * @param string iframe_attributes         attributes for iframe
 * @returns {boolean}
 */
function qlgooglemapsLoadIframe2ClickSolution(uniquefier, iframe_url, iframe_attributes = '', scripts_afterclickloaded='', confirmtext = '')
{
  // get id of iframe
  let iframeId = 'qlgooglemaps_iframe_' + uniquefier;

  if (!confirm(confirmtext)) {
    document.getElementById(iframeId).insertAdjacentHTML('beforeend', '');
    return false;
  }

  // some scripte need to be loaded aditionally to iframe
  // e. g. vimeo needs this whyever
  qlgooglemapsAddScriptToDoms(scripts_afterclickloaded);
  qlgooglemapsHideImagebutton(uniquefier);

  // build iframe html, actually add the html of the iframe
  let htmlIframe = qlgooglemapsGetIframeHtml(iframe_url, iframe_attributes);
  document.getElementById(iframeId).insertAdjacentHTML('beforeend', htmlIframe);
}

/**
 *
 * @param string uniquefier                unique addition to id, to tell one iframe from the other in the same page
 * @param string iframe_url                url of iframe, 'https://...
 * @param string scripts_afterclickloaded  scripts to be loaded after last click
 * @param int clickNumber                  number of clicks required for display of iframe
 * @param string confirmtext               text displayed in confirm pop-up
 * @param string iframe_attributes         attributes for iframe
 * @returns {boolean}
 */
function qlgooglemapsLoadIframe3ClickSolution(uniquefier, iframe_url, iframe_attributes = '', scripts_afterclickloaded='', confirmtext = '')
{
  // get id of iframe
  let iframeId = 'qlgooglemaps_iframe_' + uniquefier;

  // disable button
  let inputId = 'qlgooglemaps_readprivacy_' + uniquefier;
  document.getElementById(inputId).disabled = true;

  // remove iframe from iframe_holder
  if (!confirm(confirmtext)) {
    document.getElementById(iframeId).insertAdjacentHTML('beforeend', '');
    return false;
  }

  // some scripte need to be loaded aditionally to iframe
  // e. g. vimeo needs this whyever
  qlgooglemapsAddScriptToDoms(scripts_afterclickloaded);
  qlgooglemapsHideImagebutton(uniquefier);

  // build iframe html, actually add the html of the iframe
  let htmlIframe = qlgooglemapsGetIframeHtml(iframe_url, iframe_attributes);
  document.getElementById(iframeId).insertAdjacentHTML('beforeend', htmlIframe);
}

/**
 *
 * @param string uniquefier                unique addition to id, to tell one iframe from the other in the same page
 * @param string iframe_url                url of iframe, 'https://...
 * @param string scripts_afterclickloaded  scripts to be loaded after last click
 * @param int clickNumber                  number of clicks required for display of iframe
 * @param string confirmtext               text displayed in confirm pop-up
 * @param string iframe_attributes         attributes for iframe
 * @returns {boolean}
 */
function qlgooglemapsLoadIframe100ClickSolution(uniquefier, iframe_url, iframe_attributes = '', scripts_afterclickloaded='', confirmtext = '', pitatexts = '')
{
  // get id of iframe
  let iframeId = 'qlgooglemaps_iframe_' + uniquefier;

  // disable button
  let inputId = 'qlgooglemaps_readprivacy_' + uniquefier;
  document.getElementById(inputId).disabled = true;

  // remove iframe from iframe_holder
  if (!confirm(confirmtext)) {
    document.getElementById(iframeId).insertAdjacentHTML('beforeend', '');
    return false;
  }

  if ('undefined' !== typeof pitatexts) {
    let pitatextsSplitted = pitatexts.split('~~');
    for (let i = 0; i < pitatextsSplitted.length; i++) {
      confirmtext= pitatextsSplitted[i];
      // remove iframe from iframe_holder
      if (!confirm(confirmtext)) {
        document.getElementById(iframeId).insertAdjacentHTML('beforeend', '');
        return false;
      }
    }
  }

  // some scripte need to be loaded aditionally to iframe
  // e. g. vimeo needs this whyever
  qlgooglemapsAddScriptToDoms(scripts_afterclickloaded);
  qlgooglemapsHideImagebutton(uniquefier);

  // build iframe html, actually add the html of the iframe
  let htmlIframe = qlgooglemapsGetIframeHtml(iframe_url, iframe_attributes);
  document.getElementById(iframeId).insertAdjacentHTML('beforeend', htmlIframe);
}

/**
 * adds scripts to DOM after the last click
 * multiple scripts can be added, they need to be separated by linebreak
 * @param string scripts_afterclickloaded - scripts to be loaded after last click, e. g. required on vimeo
 */
function qlgooglemapsAddScriptToDoms(scripts_afterclickloaded) {
  let scripts = scripts_afterclickloaded.split("\n");

  let elScript = document.createElement('script');
  elScript.setAttribute('type', 'text/javascript');
  for (let i = 0; i < scripts.length; i++) {
    elScript.setAttribute('src', scripts[i]);
    document.head.appendChild(elScript);
  }
}

/**
 * checks whether privacy is read
 * removes button property 'disabled' from "Display map"-button
 * @param uniquefier
 * @returns {boolean}
 */
function qlgooglemapsEnableButton(uniquefier) {
  let inputId = 'qlgooglemaps_readprivacy_' + uniquefier;
  let buttonId = 'qlgooglemaps_button_' + uniquefier;
  let imageButtonId = 'qlgooglemaps_button_image_' + uniquefier;

  if (!document.getElementById(inputId).checked) {
    if (null !== document.getElementById(buttonId)) document.getElementById(buttonId).disabled = true;
    if (null !== document.getElementById(imageButtonId)){
      document.getElementById(imageButtonId).style.display = 'none';
      document.getElementById(imageButtonId).disabled = true;
    }
    return false;
  }
  if (null !== document.getElementById(buttonId)) document.getElementById(buttonId).disabled = false;
  if (null !== document.getElementById(imageButtonId)) {
    document.getElementById(imageButtonId).style.display = 'block';
    document.getElementById(imageButtonId).disabled = false;
  }
}

/**
 * checks whether privacy is read
 * removes button property 'disabled' from "Display map"-button
 * @returns {boolean}
 * @param iframe_url
 * @param iframe_attributes
 */
function qlgooglemapsGetIframeHtml(iframe_url, iframe_attributes) {
  // build iframe html
  let htmlIframe = '<iframe src="IFRAME_URL" IFRAME_ATTRIBUTES></iframe>';
  htmlIframe = htmlIframe.replace("IFRAME_URL", iframe_url);
  htmlIframe = htmlIframe.replace("IFRAME_ATTRIBUTES", iframe_attributes);
  return htmlIframe;
}

/**
 * checks whether privacy is read
 * removes button property 'disabled' from "Display map"-button
 * @param uniquefier
 * @returns {boolean}
 */
function qlgooglemapsHideImagebutton(uniquefier)
{
  let imageButtonId = 'qlgooglemaps_button_image_' + uniquefier;
  if ('undefined' === typeof document.getElementById(imageButtonId)) return;
  document.getElementById(imageButtonId).style.display = 'none';
}