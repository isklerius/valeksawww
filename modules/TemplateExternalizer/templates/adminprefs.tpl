<h3>{$title_section}</h3>
{if isset($info_devmode_on)}
  <h4 style="color: green;">{$info_devmode_on}</h4>
{/if}
{if $message!=''}<p>{$message}</p>{/if}
{$startform}
	<div class="pageoverflow">
		<p class="pagetext">{$title_dev_mode}:</p>
		<p class="pageinput">{$input_dev_mode}
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_timeout}:</p>
		<p class="pageinput">{$input_timeout}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_cache_path}:</p>
		<p class="pageinput">{$input_cache_path}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_template_extension}:</p>
		<p class="pageinput">{$input_template_extension}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_stylesheet_extension}:</p>
		<p class="pageinput">{$input_stylesheet_extension}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$submit}</p>
	</div>
{$endform}
