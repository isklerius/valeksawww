{cms_include tpl="header"}
		<div class="content">
				{cms_module module="Titulinis" kategorija="foto" kalba=$kalba}
				<div class="blocks">
						{content  label="Nuoroda 1" block_group="Blokeliai" block="link1" collapse="false" assign = "link1" oneline=true}
						{content  label="Blokelis 1" block_group="Blokeliai" block="block1" collapse="false" assign = "block1"}
						{content  label="Nuoroda 2" block_group="Blokeliai" block="link2" collapse="false" assign = "link2" oneline=true}
						{content  label="Blokelis 2" block_group="Blokeliai" block="block2" collapse="false" assign = "block2"}
						{content  label="Nuoroda 3" block_group="Blokeliai" block="link3" collapse="false" assign = "link3" oneline=true}
						{content  label="Blokelis 3" block_group="Blokeliai" block="block3" collapse="false" assign = "block3"}
						{content  label="Nuoroda 4" block_group="Blokeliai" block="link4" collapse="false" assign = "link4" oneline=true}
						{content  label="Blokelis 4" block_group="Blokeliai" block="block4" collapse="false" assign = "block4"}
						{content  label="Tekstas po blokeliais" block_group="Turinys" block="pofoto" collapse="false" assign = "pofoto"}
					{if $block1}
						{if $link1}
							<a class="block" href="{$link1}">
								{$block1}
							</a>
						{else}
						<div class="block">
							{$block1}
						</div>
						{/if}
						
					{/if}
					{if $block2}
						{if $link2}
							<a class="block" href="{$link2}">
								{$block2}
							</a>
						{else}
						<div class="block">
							{$block2}
						</div>
						{/if}
					{/if}
					{if $block3}
						{if $link3}
							<a class="block" href="{$link3}">
								{$block3}
							</a>
						{else}
						<div class="block">
							{$block3}
						</div>
						{/if}
					{/if}
					{if $block4}
						{if $link4}
							<a class="block last" href="{$link4}">
								{$block4}
							</a>
						{else}
						<div class="block last">
							{$block4}
						</div>
						{/if}
					{/if}
					<div class="clear"></div>
				</div>
				{*}<div class="about">
					{$pofoto}
					<div class="clear"></div>
				</div>
				<div class="info">
					<h2>{#naujienos#}</h2>
						{cms_module module="news" number="2" summarytemplate="titlepage" detailpage=$smarty.config.detnews category=informacija_kreditoriams_$kalba}
						<a href="{cms_selflink href=$smarty.config.detnews}" class="placiau">{#daugiau#}</a>
				</div>{*}
					<div class="clear"></div>
			</div>
{cms_include tpl="footer"}