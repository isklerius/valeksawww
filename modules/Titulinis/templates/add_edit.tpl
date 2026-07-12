		{$hid}
	<div class="pageoverflow">
		<a name="fok"></a><p class="pagetext">&nbsp;</p>
		
		<p class="pageinput">{$submit}{$cancel}{$change}</p>
	</div>

	{if $smarty.get.m1_kat == "blokai" }
		{foreach from=$props item=prop key=k}	
		 {if $a->$k}
		 	  {if $k=="kategorija" || $k=="eiliskumas" || $k=="koord" || $k=="vardas" || $k=="antraste2"}<div style="display: none">{/if}
			<div class="pageoverflow">	
				<p class="pagetext">{if $k=="paveiksliukas"}{$t->$k}{elseif $k=='tekstas'}Tekstas{elseif $t->$k}{$t->$k}{else}{$k}{/if}:</p>
			 {if $k=="kalba"} 
				<p class="pageinput">
				    {html_options name=$k options=$kalbos|upper selected=$r->$k}
				</p>
			 	 {elseif $k=="paveiksliukas" && $f->$k}
				<p class="pageinput">{if $f->$k}<img src="{root_url}/uploads/images/titulinis/{$f->$k}" style="width: 80px"><br />{$a->$k} {$Titulinis->lang(del)}: {$d->$k}{/if}</p>
			 {else}						
				<p class="pageinput">{$a->$k} {if $f->$k}<a href="{root_url}/uploads/images/titulinis/{$f->$k}" target="_blank">{$f->$k}</a> {$Titulinis->lang(del)}: {$d->$k}{/if}</p>	
			 {/if}	
			</div>	     
		  {if $k=="kategorija"   || $k=="eiliskumas" || $k=="koord" || $k=="vardas" || $k=="antraste2"}</div>{/if}
		 {/if}
		{/foreach}	
	

	
	
	{elseif $smarty.get.m1_kat == "darb"}
		{foreach from=$props item=prop key=k}	
		{if $a->$k}
			{if  $k=="kategorija" || $k=="eiliskumas" || $k=="tekstas" || $k=="kalba" || $k=="antraste"}<div style="display: none">{/if}
			<div class="pageoverflow">	
				<p class="pagetext"> {if $t->$k}{$t->$k}{else}{$k}{/if}:</p>
			 {if $k=="kalba"}
				<p class="pageinput">
				    {html_options name=$k options=$kalbos|upper selected=$r->$k}
				</p>
			 {else}						
				<p class="pageinput">{$a->$k} {if $f->$k}{$f->$k}{*<a href="{root_url}/uploads/images/{$f->$k}" target="_blank">{$f->$k}</a>*} {$Titulinis->lang(del)}: {$d->$k}{/if}</p>	
			 {/if}	
			</div>	     
			{if $k=="kategorija" || $k=="eiliskumas" || $k=="tekstas" || $k=="kalba" || $k=="antraste" }</div>{/if}
		{/if}
		{/foreach}	

	
	{elseif $smarty.get.m1_kat == "foto"}
		{foreach from=$props item=prop key=k}	
		
		{if $a->$k}

			{if $k=="kategorija"  || $k=="data"  || $k=="koord"  || $k=="data" || $k=="nuoroda" || $k=="vardas" || $k=="antraste2" || $k=="antraste" || $k=="eiliskumas" || $k=="pavadinimas"}<div style="display: none">{/if}
			<div class="pageoverflow">	
				<p class="pagetext"> {if $k=="paveiksliukas"}{$t->$k} {$Titulinis->Lang('wd1')}x {$Titulinis->Lang('hg1')}{elseif $t->$k}{$t->$k}{else}{$k}{/if}:</p>
			 {if $k=="kalba"}
				<p class="pageinput">
				    {html_options name=$k options=$kalbos|upper selected=$r->$k}
				</p>
			 {elseif $k=="paveiksliukas" && $f->$k}
			
				<p class="pageinput">{if $f->$k}
				<img src="{root_url}/uploads/images/titulinis/{$f->$k}" style="width: 80px">
				{*<a href="{root_url}/lib/filemanager/ImageManager/editor.php?img=/{$f->$k}&wdt={$Titulinis->Lang(wd1)}&hgt={$Titulinis->Lang(hg1)}" target="_blank" ><img src="{root_url}/uploads/images/{$f->$k}" style="width: 80px">&nbsp;&nbsp;{$Titulinis->lang(editimage)}</a> *}<br />{$a->$k} {$Titulinis->lang(del)}: {$d->$k}{/if}</p>				
			 {else}						
				<p class="pageinput">{$a->$k} {if $f->$k}<a href="{$root_url}/uploads/images/{$f->$k}" target="_blank">{$f->$k}</a> {$Titulinis->lang(del)}: {$d->$k}{/if}</p>	
			 {/if}	
			</div>	     
			{if $k=="kategorija" || $k=="data"  || $k=="koord"  || $k=="nuoroda" || $k=="vardas"  || $k=="antraste2" || $k=="antraste" || $k=="eiliskumas"  || $k=="pavadinimas"}</div>{/if}
		{/if}
		{/foreach}	

	
	{else}
		{foreach from=$props item=prop key=k}	
		 {if $a->$k}
		  {if $k=="pavadinimas" || $k=="informacija_1_dalis" || $k=="informacija_2_dalis" || $k=="kategorija"}<div style="display: none">{/if}
			<div class="pageoverflow">
				<p class="pagetext">{if $t->$k}{$t->$k}{else}{$k}{/if}:</p>
			 {if $k=="kalba"}
				<p class="pageinput">
				    {html_options name=$k options=$kalbos|upper selected=$r->$k}
				</p>
			 {else}					
				<p class="pageinput">{$a->$k} {if $f->$k}<a href="{$root_url}/uploads/images/{$f->$k}" target="_blank">{$f->$k}</a> {$Titulinis->lang(del)}: {$d->$k}{/if}</p>  
			 {/if}	
			</div>	     
		   {if $k=="pavadinimas" || $k=="informacija_1_dalis" || $k=="informacija_2_dalis"  || $k=="kategorija"}</div>{/if}			
		 {/if}
		{/foreach}		
	{/if}
	
<input type="hidden" name="m1_kat" value="{$smarty.get.m1_kat}"/>

	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$submit}{$cancel}{$change}</p>
	</div>
