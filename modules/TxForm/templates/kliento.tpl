{$formstart}
{if $form_errors}
<ul class="err">
{foreach from=$form_errors key=k item=v}
    {if $v && $k!='bad_kont_asm_elp'}<li>{#uzpildyk#} {$v}</li>
   {elseif $v && $k=='bad_kont_asm_elp'}
		<li >{$v}</li>
   {/if}
{/foreach}
</ul>
{/if}
<div class="forma">
{field type="hidden" prefix=$prefix name='form_id' value='9' }
<table>
<tr>
	<td><label>{#imone_pav#}</label></td>
	<td>{field type="text" name='imone_pav' label="0" required=1 prefix=$prefix defval=$imone_pav}</td>
</tr>
<tr>
	<td><label>{#imone_kod#}</label></td>
	<td>{field type="text" name='imone_kod' label="0" required=1 prefix=$prefix defval=$imone_kod}</td>
</tr>
<tr>
	<td><label>{#pvm_mok_kodas#}</label></td>
	<td>{field type="text" name='pvm_mok_kodas' label="0" required=1 prefix=$prefix defval=$pvm_mok_kodas}</td>
</tr>
<tr>
	<td><label>{#imone_adresas#}</label></td>
	<td>{field type="text" name='imone_adresas' label="0" required=1 prefix=$prefix defval=$imone_adresas}</td>
</tr>
<tr>
	<td><label>{#tel#}</label></td>
	<td>{field type="text" name='tel' label="0" prefix=$prefix defval=$tel}</td>
</tr>
<tr>
	<td><label>{#faks#}</label></td>
	<td>{field type="text" name='faks' label="0" prefix=$prefix defval=$faks}</td>
</tr>
<tr>
	<td><label>{#elp#}</label></td>
	<td>{field type="text" name='elp' label="0" prefix=$prefix defval=$elp}</td>
</tr>
<tr>
	<td><label>{#ats_sask#}</label></td>
	<td>{field type="text" name='ats_sask' label="0" prefix=$prefix defval=$ats_sask}</td>
</tr>
<tr>
	<td><label>{#kont_asm_vp#}</label></td>
	<td>{field type="text" name='kont_asm_vp' label="0" required=1 prefix=$prefix defval=$kont_asm_vp}</td>
</tr>
<tr>
	<td><label>{#kont_asm_tel#}</label></td>
	<td>{field type="text" name='kont_asm_tel' label="0" required=1 prefix=$prefix defval=$kont_asm_tel}</td>
</tr>
<tr>
	<td><label>{#kont_asm_mobtel#}</label></td>
	<td>{field type="text" name='kont_asm_mobtel' label="0" prefix=$prefix defval=$kont_asm_mobtel}</td>
</tr>
<tr>
	<td><label>{#kont_asm_elp#}</label></td>
	<td>{field type="text" name='kont_asm_elp' label="0" required=1 prefix=$prefix defval=$kont_asm_elp}</td>
</tr>
<tr>
	<td><label>{#siunt_paem#}</label></td>
	<td>{field type="text" name='siunt_paem' label="0" required=1 prefix=$prefix defval=$siunt_paem}</td>
</tr>
<tr>
	<td><label>{#pap_info#}</label></td>
	<td>{field type="textarea" name='pap_info' label="0" prefix=$prefix defval=$pap_info}</td>
</tr>
<tr>
								<td colspan="2"><div class="submit fr"><button type="submit">{#siusti#}</button></div></td>
							</tr>
</table>
</div>
<span>{#butini#}</span>
</form>