<div class="anthemeblocks-reassurance">
<ul class="clearfix">
{foreach from=$an_staticblock->getChildrenBlocks() item=block}
	<li><div class="anthemeblocks-reassurance-item">{$block->getContent() nofilter}</div></li>
{/foreach}
</ul>
</div>