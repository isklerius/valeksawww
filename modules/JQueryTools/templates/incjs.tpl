
<!-- JQueryTools -->
{if isset($libs)}
{foreach from=$libs item='one'}
<script type="text/javascript" src="{$base_url}{$one}"></script>
{/foreach}
{/if}

{if isset($css)}
{foreach from=$css item='one'}
<link rel="stylesheet" type="text/css" href="{$base_url}css/{$one}" media="screen" />
{/foreach}
{/if}
