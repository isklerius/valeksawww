{$formstart}
{if $form_errors}
<ul class="err">
{foreach from=$form_errors key=k item=v}
   {if $v}
		<li >{$v}</li>
   {/if}
{/foreach}
</ul>
{/if}
<div class="forma">
{field type="hidden" prefix=$prefix name='form_id' value='8' }
<table>
<tr>
	<td><label>{#vardas#} *</label></td>
	<td>{field type="text" name='vardas' label="0" required=1 prefix=$prefix defval=$vardas}</td>
</tr>
<tr>
	<td><label>{#imone#}</label></td>
	<td>{field type="text" name='imone' label="0" required=1 prefix=$prefix defval=$imone}</td>
</tr>
<tr>
	<td><label>{#elp#}</label></td>
	<td>{field type="text" name='elp' label="0" required=1 prefix=$prefix defval=$elp}</td>
</tr>
<tr>
	<td><label>{#tekstas#}</label></td>
	<td>{field type="textarea" name='tekstas' label="0" prefix=$prefix defval=$tekstas}</td>
</tr>
<tr>
								<td colspan="2"><div class="submit fr"><button type="submit">{#siusti#}</button></div></td>
							</tr>
</table>
</div>
</form>