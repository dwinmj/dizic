<div class="two-banners-block">
	<div class="two_block">
		{if $an_staticblock->getImageLink()<>''}
			<img src="{$an_staticblock->getImageLink()}" alt="{$an_staticblock->title|escape:'htmlall':'UTF-8'}" width="100%">
		{/if}
		<div class="two_block_content">
			<span>{$an_staticblock->title|escape:'htmlall':'UTF-8'}</span>
			{$an_staticblock->content nofilter}
			{if $an_staticblock->link <>''}
				<a class="two_block_link" href="{$an_staticblock->link}">{l s='SHOP NOW' mod='anthemeblocks'}</a>
			{/if}
		</div>
	</div>
</div>		