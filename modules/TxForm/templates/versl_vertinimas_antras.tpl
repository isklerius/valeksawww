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
<div class="form">
{$formstart}
{field type="hidden" prefix=$prefix name='form_id' value='5' }

					<form>
						<table width="100%">
							<tr>
								<td class="padding">
									<h3>{#pard_augin#}</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
									</p>
									{field type="text" name='pard_augin' prefix=$prefix label="0" class="ajax" required=1 defval=$pard_augin}
								</td>
								<td>
									<h3>{#eksp_dalis#}</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
									</p>
									{field type="select" label="0"  prefix=$prefix name="eksp_dalis" options=$eksp_dalis selected="0" class="select"}
								</td>
							</tr>
							<tr>
								<td class="padding">
									<h3>{#ebt#}</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
									</p>
									{field type="text" name='ebt'  class="ajax" prefix=$prefix label="0" required=1 defval=$ebt}
								</td>
								<td>
									<h3>{#gryn_pelnas#}</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
									</p>
									{field type="text" name='gryn_pelnas'  class="ajax" prefix=$prefix label="0" required=1 defval=$gryn_pelnas}
								</td>
							</tr>
								<tr>
								<td class="padding">
									<h3>{#fin_skolos#}</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
									</p>
									{field type="text" name='fin_skolos'  class="ajax" prefix=$prefix label="0" required=1 defval=$fin_skolos}
								</td>
								<td>
									<h3>{#nusid_amort#}</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
									</p>
									{field type="text" name='nusid_amort' class="ajax" prefix=$prefix label="0" required=1 defval=$nusid_amort}
								</td>
							</tr>
								<tr>
								<td class="padding">
									<h3>{#pinig_akvival#}</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
									</p>
									{field type="text" name='pinig_akvival' class="ajax" prefix=$prefix label="0" required=1 defval=$pinig_akvival}
								</td>
								<td>
									<h3>{#paluk_skolos#}</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
									</p>
									{field type="text" name='paluk_skolos' class="ajax" prefix=$prefix label="0" required=1 defval=$paluk_skolos}
								</td>
							</tr>
							<tr>
								<td colspan="2" style="text-align:right">
								<div class="button">
										<span class="lbt"></span>
											<button type="submit">{#patvirtinti#}</button>
										<span class="rbt"></span>
									</div>
								<div class="button">
										<span class="lbt"></span>
											<a href="{cms_selflink href=$smarty.config.prevstep_id}">{#grizti#}</a>
										<span class="rbt"></span>
									</div>
									
								<td>
							</tr>
						</table>
					</form>
				</div>






