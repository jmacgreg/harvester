{**
 * header.tpl
 *
 * Copyright (c) 2005-2009 Alec Smecher and John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Common site header.
 *
 * $Id$
 *}
{strip}
{translate|assign:"applicationName" key="common.harvester2"}
{assign var="customLogoTemplate" value="common/customLogoTemplate.tpl"}
{include file="core:common/header.tpl"}
{/strip}
