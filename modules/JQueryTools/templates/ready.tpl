{* here we set default values and attributes for the libs that are loaded. *}
{literal}
<script type="text/javascript">
jQuery(document).ready(function($)
    {
	{/literal}{if isset($jquery_libs.tablesorter)}{literal}
        jQuery(".cms_sortable")
                .tablesorter({widthFixed: true, widgets: ['zebra']})
        {/literal}{/if}{literal}
		
	{/literal}{if isset($jquery_libs.lightbox)}{literal}
		jQuery('a[@rel*=lightbox]').lightBox();
	{/literal}{/if}{literal}

	{/literal}{if isset($jquery_libs.cluetip)}{literal}
        jQuery("a.tooltip").cluetip({local:true, cursor: 'pointer'});
	{/literal}{/if}{literal}
	
});  //end
</script>
{/literal}
