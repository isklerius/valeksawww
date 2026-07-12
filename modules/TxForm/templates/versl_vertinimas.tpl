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
{field type="hidden" prefix=$prefix name='form_id' value='4' }
{capture assign=toliau}{cms_selflink href=$smarty.config.nextstep_id}{/capture}
{field type="hidden" prefix=$prefix name='toliau' value=$toliau}
						<table>
							<tr>
								<td>
									<label>{#imon_pav#}</label><br/>
									{field type="text" name='imon_pav' prefix=$prefix label="0" required=1 defval=$imon_pav}
								</td>
								<td>
									<label>{#vardas#}</label><br/>
									{field type="text" name='vardas' prefix=$prefix label="0" required=1 defval=$vardas}
								</td>
							</tr>
							<tr>
								<td>
									<label>{#imon_tipas#}</label><br/>
									{field type="select" label="0"  prefix=$prefix name="imon_tipas" options=$imon_tipas selected="0" class="select"}
								</td>
								<td>
									<label>{#pavarde#}</label><br/>
									{field type="text" name='pavarde' prefix=$prefix label="0" required=1 defval=$pavarde}
								</td>
							</tr>
							<tr>
								<td>
									<label>{#vers_sekt#}</label><br/>
									{field type="select" label="0"  prefix=$prefix name="vers_sekt" options=$vers_sekt selected="0" class="select"}
								</td>
								<td>
									<label>{#pareig#}</label><br/>
									{field type="text" name='pareig' prefix=$prefix label="0" required=1 defval=$pareig}
								</td>
							</tr>
							<tr>
								<td>
									<label>{#tikslas#}</label><br/>
									{field type="select" label="0"  prefix=$prefix name="tikslas" options=$tikslas selected="0" class="select"}
								</td>
								<td>
									<label>{#telnr#}</label><br/>
									{field type="text" name='telnr' prefix=$prefix label="0" required=1 defval=$telnr}
								</td>
							</tr>
							<tr>
								<td>
									&nbsp;
								</td>
								<td>
									<label>{#elp#}</label><br/>
									{field type="text" name='elp' prefix=$prefix label="0" required=1 defval=$elp}
								</td>
							</tr>
							<tr>
								<td colspan="2" style="text-align:right">
									<div class="button">
										<span class="lbt"></span>
											<button type="submit">{#sekantis#}</button>
										<span class="rbt"></span>
									</div>
								<td>
							</tr>
						</table>
					</form>