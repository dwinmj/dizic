{if $an_staticblock->link!=''}
<a href="{$an_staticblock->link}">
{/if}
	{if $an_staticblock->getImageLink() != ''}
	<img src="{$an_staticblock->getImageLink()}" alt="{$an_staticblock->title|escape:'htmlall':'UTF-8'}">
	{/if}
	<div class="anthemeblocks-homeslider-desc">
		<span>{$an_staticblock->title|escape:'htmlall':'UTF-8'}</span>
		{$an_staticblock->content nofilter}
		{if $an_staticblock->link!=''}
		<button class="btn btn-primary">Shop now</button>
		{/if}
	</div>
{if $an_staticblock->link!=''}
</a>
{/if}