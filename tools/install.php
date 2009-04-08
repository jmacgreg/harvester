<?php

/**
 * @file tools/install.php
 *
 * Copyright (c) 2005-2009 Alec Smecher and John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class installTool
 * @ingroup tools
 *
 * @brief CLI tool for installing Harvester2.
 *
 */

// $Id$


define('INDEX_FILE_LOCATION', dirname(dirname(__FILE__)) . '/index.php');
require(dirname(dirname(__FILE__)) . '/lib/pkp/classes/cliTool/CliTool.inc.php');

import('cliTool.InstallTool');

class HarvesterInstallTool extends InstallTool {
	/**
	 * Constructor.
	 * @param $argv array command-line arguments
	 */
	function HarvesterInstallTool($argv = array()) {
		parent::InstallTool($argv);
	}

	/**
	 * Read installation parameters from stdin.
	 * FIXME: May want to implement an abstract "CLIForm" class handling input/validation.
	 * FIXME: Use readline if available?
	 */
	function readParams() {
		printf("%s\n", Locale::translate('installer.harvester2Installation'));

		parent::readParams();

		$this->readParamBoolean('install', 'installer.installHarvester2');

		return $this->params['install'];
	}

}

$tool = new HarvesterInstallTool(isset($argv) ? $argv : array());
$tool->execute();

?>
