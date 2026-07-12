
{$formstart}
{if $form_errors}
<ul class="err">
{foreach from=$form_errors key=k item=v}
   {if $v}<li >{$v}</li>{/if}
{/foreach}
</ul>
{/if}
<div class="forma">
{field type="hidden" prefix=$prefix name='form_id' value='1' }
<label>
{#vardas#}
</label><br />
{field type="text" name='vardas' label="0" prefix=$prefix defval=$vardas}
<div class="clear clear1"><!----></div>
<label>
{#elpastas#}
</label><br />
{field type="text" name='elpastas' prefix=$prefix label="0" required=1 defval=$elpastas}
<div class="clear clear1"><!----></div>
<label>
{#zinute#}
</label><br />
{field type="textarea" name='zinute' prefix=$prefix label="0" defval=$zinute rows="30" cols="5"}
<div class="clear clear1"><!----></div>

<div class="clear clear1"><!----></div>
</div>
<br/>
<div class="butt"><button type="submit">{#siusti#}</button><span class="arr"><!----></span>
<div class="clear"><!----></div></div>
</form>