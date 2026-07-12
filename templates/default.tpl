{cms_include tpl="header"}
	<div class="content">
				<div class="vidus">
					{assign var=mainimg value=$content_obj->mId|check_headimg}
					{if $mainimg}
						<div class="slider">
							<div class="container">
										<img src="{$mainimg}"/>
							</div>
						</div>
					{/if}
					<div class="vidcnt" {if $mainimg} style="top:-20px;" {elseif !$mainimg} style="top:20px;" {/if}>
					<div class="leftmenu">
						{menu template="leftmenu" collapse="1"  start_level=3 number_of_levels=3}
					</div>
					<div class="middle">
						<h1>{title}</h1>
						{content}
					</div>
				<div class="clear"></div>
					</div>
				<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
{cms_include tpl="footer"}
