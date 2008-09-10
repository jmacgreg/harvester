{**
 * block.tpl
 *
 * Copyright (c) 2005-2008 Alec Smecher and John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Search block for sidebar
 *
 * $Id$
 *}
<div class="block" id="sidebarNavigation">
	<span class="blockTitle">{translate key="navigation.search"}</span>
	<form method="post" action="{url page="search" op="searchResults"}">
	<table>
	<tr>
		<td><input type="text" id="q" name="q" size="15" maxlength="255" value="" class="textField" /></td>
	</tr>
	<tr>
		<td><input type="submit" value="{translate key="common.search"}" class="button" /></td>
	</tr>
	</table>
	</form>
</div>