<?php

/**
 * @file IPBanPluginPlugin.inc.php
 *
 * Copyright (c) 2005-2010 Alec Smecher and John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @package plugins.generic.ipban
 * @class IPBanPlugin
 *
 * IP Banning plugin; bans all access by IP
 *
 */

// $Id$


import('plugins.GenericPlugin');

class IPBanPlugin extends GenericPlugin {
	/**
	 * Register the plugin.
	 */
	function register($category, $path) {
		if (!Config::getVar('general', 'installed')) return false;
		$success = parent::register($category, $path);
		$this->addLocaleData();
		if ($success) {
			if ($this->isEnabled()) {
				HookRegistry::register('LoadHandler', array(&$this, '_loadHandlerCallback'));
			}
		}
		return $success;
	}

	/**
	 * Prevent the Harvester from responding to certain IP addresses.
	 */
	function _loadHandlerCallback($hookName, $args) {
		$ips = array();
		@$ips = array_map('rtrim',file(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ips.txt'));
		if (is_array($ips) && in_array(Request::getRemoteAddr(), $ips)) exit();
		return false;
	}

	function getName() {
		return 'IPBanPlugin';
	}

	/**
	 * Get the display name of this plugin's protocol.
	 * @return String
	 */
	function getDisplayName() {
		return Locale::translate('plugins.generic.ipban.name');
	}

	/**
	 * Get a description of the plugin.
	 */
	function getDescription() {
		return Locale::translate('plugins.generic.ipban.description');
	}

	function getManagementVerbs() {
		if ($this->isEnabled()) return array(
			array('disable', Locale::translate('common.disable'))
		);
		else return array(
			array('enable', Locale::translate('common.enable'))
		);
	}

 	/*
 	 * Execute a management verb on this plugin
 	 * @param $verb string
 	 * @param $args array
	 * @param $message string Location for the plugin to put a result msg
 	 * @return boolean
 	 */
	function manage($verb, $args, &$message) {
		switch ($verb) {
			case 'enable':
				$this->updateSetting('enabled', true);
				$message = Locale::translate('plugins.generic.ipban.enabled');
				break;
			case 'disable':
				$this->updateSetting('enabled', false);
				$message = Locale::translate('plugins.generic.ipban.disabled');
				break;
		}
	}

	function isEnabled() {
		return $this->getSetting('enabled');
	}
}

?>
