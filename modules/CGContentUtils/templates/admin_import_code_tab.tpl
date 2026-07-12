{$formstart}

<fieldset class="pageoverflow" style="color:black;padding:5px;background-color:white;border:2px dotted orange">
{$mod->Lang('info_import_code')}
</fieldset>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('xml_file')}:</p>
  <p class="pageinput">
    <input type="file" name="{$actionid}xmlfile" size="80"/>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="submit" name="{$actionid}scan_code" value="{$mod->Lang('scan')}"/>
  </p>
</div>

{$formend}