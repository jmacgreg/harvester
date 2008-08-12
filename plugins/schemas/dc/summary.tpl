{**
 * summary.tpl
 *
 * Copyright (c) 2005-2008 Alec Smecher and John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Display a summary of a Dublin Core record.
 *
 * $Id$
 *}
<span class="title">{$record->getTitle()|escape|truncate:90|default:"&mdash"}</span><br />
<div class="recordContents">
	<span class="author">{$record->getAuthorString()|escape|default:"&mdash;"}</span><br />
	<a href="{url page="record" op="view" path=$record->getRecordId()}" class="action">{translate key="browse.viewRecord"}</a>{if $record->getUrl()|assign:"recordUrl":true}&nbsp;|&nbsp;<a href="{$recordUrl}" class="action">{translate key="browse.viewOriginal"}</a>{/if}
</div>
