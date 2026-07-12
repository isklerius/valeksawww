{* copy content template *}
<script type='text/javascript'>
// <![CDATA[ 
{literal}
jQuery(document).ready(function(){
  jQuery('.extralink').click(function(){
    var tmp = jQuery(this).attr('rel');
    jQuery('#extra'+tmp).toggle();
    return false;
  });
  jQuery('.contentlink').click(function(){
    jQuery(this).parent().next().toggle();
    return false;
  });
});
{/literal}
// ]]>
</script>

<h3>{$mod->Lang('advanced_content_copy')}</h3>
{$formstart}
{*
<div class="pageoverflow">
  <p class="pagetext">{$prompt_parent}:</p>
  <p class="pageinput">{$parent_dropdown}</p>
</div>
*}

{foreach from=$contents item='onecontent' key='content_id' name='contentloop'}
<fieldset>
  <legend>{$onecontent->Name()} ({$content_id}:{$onecontent->Alias()})&nbsp;
    <a href="#" title="{$mod->Lang('collapse')}" class="contentlink">-</a>
  </legend>
  <div class="contentitems">
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('new_name')}:</p>
    <p class="pageinput">
      <input type="text" name="{$actionid}new_name[{$content_id}]" size="50" maxlength="255" value="{$onecontent->Name()}"/>
    </p>
  </div>    
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('new_menutext')}:</p>
    <p class="pageinput">
      <input type="text" name="{$actionid}new_menutext[{$content_id}]" size="50" maxlength="255" value="{$onecontent->Menutext()}"/>
    </p>
  </div>    
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('new_parent')}:</p>
    <p class="pageinput">
      {$parent_dropdowns.$content_id}
    </p>
  </div>
  <fieldset class="pageoverflow">
    <legend>{$mod->Lang('extra')}:&nbsp;<a href="#" rel="{$content_id}" class="extralink" title="{$mod->Lang('expand')}">+</a></legend>
    <div class="extrainfo" id="extra{$content_id}" style="display: none;">
      {* extra area *}
      <div class="pageoverflow">
        <p class="pagetext">{$mod->Lang('new_alias')}:</p>
        <p class="pageinput">
          <input type="text" name="{$actionid}new_alias[{$content_id}]" size="50" maxlength="255" value="{$newdata.$content_id.new_alias}"/>
        </p>
      </div>    

      {* display extra content blocks for this object *}
      {if isset($addblocks.$content_id)}
        {foreach from=$addblocks.$content_id item='block'}
        <div class="pageoverflow">
          <p class="pagetext">{$block.fld_label}</p>
          <p class="pageinput">{$block.fld_input}</p>
        </div>
        {/foreach}
      {/if}
    </div>
  </fieldset>
  </div>
</fieldset>
{/foreach}

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>
{$formend}