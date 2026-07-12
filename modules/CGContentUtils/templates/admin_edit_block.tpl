{literal}
<script type="text/javascript">
function change_options(type)
{
   jQuery('.blocktypes').hide();
   jQuery('#'+type).show();
}

jQuery(document).ready(function(){
  var val = jQuery('#blocktype').val();
  change_options(val);
  jQuery('#blocktype').change(function(){
    change_options(jQuery(this).val());
  });
});
</script>
{/literal}

{$formstart}
<div class="pageoverflow">
  <div class="pagetext">{$mod->Lang('name')}:</div>
  <div class="pageinput">
    <input type="text" name="{$actionid}name" value="{$one.name}"/>
    <br/>
    {$mod->Lang('info_blockname')}
  </div>
</div>

<div class="pageoverflow">
  <div class="pagetext">{$mod->Lang('prompt')}:</div>
  <div class="pageinput">
    <input type="text" name="{$actionid}prompt" value="{$one.prompt}"/>
    <br/>
    {$mod->Lang('info_blockprompt')}
  </div>
</div>

<div class="pageoverflow">
  <div class="pagetext">{$mod->Lang('default_value')}:</div>
  <div class="pageinput">
    <input type="text" name="{$actionid}dfltvalue" value="{$one.value}"/>
  </div>
</div>

<div class="pageoverflow">
  <div class="pagetext">{$mod->Lang('type')}:</div>
  <div class="pageinput">
    <select id="blocktype" name="{$actionid}type">
      {html_options options=$blocktypes selected=$one.type}
    </select>
  </div>
</div>

<div class="blocktypes" id="textinput">
  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_length')}:</div>
    <div class="pageinput">
      <input type="text" name="{$actionid}length" size="3" maxlength="3" value="{$one.attribs.length}" />
    </div>
  </div>

  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_maxlength')}:</div>
    <div class="pageinput">
      <input type="text" name="{$actionid}maxlength" size="3" maxlength="3" value="{$one.attribs.maxlength}" />
    </div>
  </div>
</div>

<div class="blocktypes" id="textarea">
  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_rows')}:</div>
    <div class="pageinput">
      <input type="text" name="{$actionid}rows" size="3" maxlength="3" value="{$one.attribs.rows}" />
    </div>
  </div>

  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_cols')}:</div>
    <div class="pageinput">
      <input type="text" name="{$actionid}cols" size="3" maxlength="3" value="{$one.attribs.cols}" />
    </div>
  </div>
</div>

<div class="blocktypes" id="dropdown">
  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_options')}:</div>
    <div class="pageinput">
      <textarea name="{$actionid}options">{$one.attribs.options}</textarea>
      <br/>
      {$mod->Lang('info_dropdown_options')}
    </div>
  </div>
</div>

<div class="blocktypes" id="checkbox">
  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_value')}:</div>
    <div class="pageinput">
      <input type="text" name="{$actionid}value" size="80" maxlength="255" value="{$one.attribs.value}" />
    </div>
  </div>
</div>

<div class="blocktypes" id="radiobuttons">
  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_options')}:</div>
    <div class="pageinput">
      <textarea name="{$actionid}radiooptions">{$one.attribs.options}</textarea>
      <br/>
      {$mod->Lang('info_dropdown_options')}
    </div>
  </div>
</div>

<div class="blocktypes" id="file_selector">
  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_dir')}:</div>
    <div class="pageinput">
      <select name="{$actionid}directory">
      {html_options options=$directories selected=$one.attribs.dir|default:''}
      </select>
    </div>
  </div>

  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_filetypes')}:</div>
    <div class="pageinput">
      <input name="{$actionid}filetypes" size="20" maxlength="255" value="{$one.attribs.filetypes|default:''}"/>
      <br/>
      {$mod->Lang('info_filetypes')}
    </div>
  </div>

  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_excludeprefix')}:</div>
    <div class="pageinput">
      <input type="text" name="{$actionid}excludeprefix" size="20" maxlength="255" value="{$one.attribs.excludeprefix|default:''}"/>
      <br/>
      {$mod->Lang('info_excludeprefix')}
    </div>
  </div>

  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_recurse')}:</div>
    <div class="pageinput">
      <select name="{$actionid}recurse">
      {cge_yesno_options selected=$one.attribs.recurse}
      </select>
    </div>
  </div>

  <div class="pageoverflow">
    <div class="pagetext">{$mod->Lang('prompt_sortfiles')}:</div>
    <div class="pageinput">
      <select name="{$actionid}sortfiles">
      {cge_yesno_options selected=$one.attribs.sortfiles}
      </select>
    </div>
  </div>
</div>

<div class="pageoverflow">
  <div class="pagetext"></div>
  <div class="pageinput">
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </div>
</div>
{$formend}