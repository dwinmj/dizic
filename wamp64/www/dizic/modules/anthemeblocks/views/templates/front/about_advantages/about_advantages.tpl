{$qq = count($an_staticblock->getChildrenBlocks())}

<div class="advantages-block row">
	<div class="{if $qq!=0}col-sm-8{else}col-sm-12{/if}">
		<div class="about_us">
			<div class="about_us_name">{$an_staticblock->title|escape:'htmlall':'UTF-8'}</div>
			<div class="about_us_content">{$an_staticblock->content}</div>
			{if $an_staticblock->link <>''}
				<a class="about_us_link" href="{$an_staticblock->link}">Read more</a>
			{/if}
		</div>
	</div>
	{if $qq!=0}
		<div class="col-sm-4">
			{foreach from=$an_staticblock->getChildrenBlocks() item=block}
			{$block->getContent() nofilter}
			{/foreach}
		</div>
	{/if}
</div>