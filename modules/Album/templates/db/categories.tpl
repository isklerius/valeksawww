{section name=album loop=$categories}
<div class="album_content">
	<h3>{$categories[album].category->name}</h3>
	{if !empty($categories[album].category->comment)}<p>{$categories[album].category->comment}</p>{/if}
	{$categories[album].albums_content}
</div>
{/section}
<div class="clear"></div>