<?php
/**
 * @package       Joomla.Plugin
 * @subpackage    content.plg_livereload
 * @copyright     Copyright (C) 2017 Mikołaj Pich, Inc. All rights reserved.
 * @license       GNU General Public License version 2 or later; see LICENSE
 */

// no direct access
defined('_JEXEC') or die;


$app = JFactory::getApplication();

if($app->isSite())
{
	$plugin = JPluginHelper::getPlugin('content', 'livereload');
	$params = new JRegistry($plugin->params);
	$document = JFactory::getDocument();
	$document->addScriptDeclaration('
		(function ($, window) {
			$(function () {
				var host = location.host.split(":")[0] || "localhost",
					script = $("<script>"),
					protocol = window.location.protocol;
				script.attr("src", protocol + "//" + host + ":'.$params->get('custom_port').'/livereload.js");
				$("body").append(script);
			});
		}(jQuery, window));
	');
}
