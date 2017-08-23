{$qq = count($an_staticblock->getChildrenBlocks())}

{if $qq!=0}
	<div id="advantages" class="row">
		{foreach from=$an_staticblock->getChildrenBlocks() item=block}
		{$block->getContent() nofilter}
		{/foreach}						
	</div>
{/if}