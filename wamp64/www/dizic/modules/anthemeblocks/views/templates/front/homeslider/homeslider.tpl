<div class="anthemeblocks-homeslider owl-carousel owl-theme" id="anthemeblocks-homeslider_{$an_staticblock->id}" {if $an_staticblock->formdata} data-items="{$an_staticblock->formdata->additional_field_homeslider_items}" data-nav="{$an_staticblock->formdata->additional_field_homeslider_nav}" data-dots="{$an_staticblock->formdata->additional_field_homeslider_dots}" data-loop="{$an_staticblock->formdata->additional_field_homeslider_loop}"   data-autoplay="{$an_staticblock->formdata->additional_field_homeslider_autoplay}" data-autoplaytimeout="{$an_staticblock->formdata->additional_field_homeslider_autoplayTimeout}"{/if}>
{foreach from=$an_staticblock->getChildrenBlocks() item=block}
	<div class="item">{$block->getContent() nofilter}</div>
{/foreach}
</div>