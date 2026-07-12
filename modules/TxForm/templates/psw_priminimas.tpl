{if $form_errors|@count}
<ul  class="error">
{foreach from=$form_errors key=k item=v}
  {if $v && $k!='ne_elp'}<li>{#uzpildyk#} {$v}</li>
   {elseif $v && $k=='ne_elp'}
		<li >{$v}</li>
   {/if}
{/foreach}
</ul>

{/if}
{$formstart}
{field type="hidden" prefix=$prefix name='form_id' value='6' }
{field type="hidden" prefix=$prefix name='toliau' value=$toliau}
						<table>
							<tr>
								<td>
									<label>{#elp#}</label><br/>
									{field type="text" name='elp' prefix=$prefix label="0" required=1 defval=$elp}
								</td>
							</tr>
							<tr>
								<td colspan="2" style="text-align:right">
									<div class="button">
										<span class="l"></span>
											<button type="submit">{#priminti#}</button>
										<span class="r"></span>
									</div>
								<td>
							</tr>
						</table>
					</form>