<?php

/**
 * @file plugins/preprocessors/languagemap/index.php
 *
 * Copyright (c) 2005-2009 Alec Smecher and John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Wrapper for ToAlpha3 preprocessor plugin.
 *
 * @package plugins.preprocessors.languagemap
 *
 * $Id$
 */

require_once('RegexPreprocessorPlugin.inc.php');

return new RegexPreprocessorPlugin();

?>
