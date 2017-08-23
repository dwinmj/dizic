{$qq = count($an_staticblock->getChildrenBlocks())}

{if $qq!=0}
	<div id="two-banners" class="">
		{foreach from=$an_staticblock->getChildrenBlocks() item=block}
		{$block->getContent() nofilter}
		{/foreach}						
	</div>
{/if}