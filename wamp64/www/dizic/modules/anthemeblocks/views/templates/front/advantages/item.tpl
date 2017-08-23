<div class="col-sm-4 col-xs-12">
		{if $an_staticblock->link <>''}
			<a class="" href="{$an_staticblock->link}">
		{/if}
				{if $an_staticblock->getImageLink()<>''}
					<img src="{$an_staticblock->getImageLink()}" alt="{$an_staticblock->title|escape:'htmlall':'UTF-8'}">
				{/if}		
				<div class="advantage_wr">
					<span>{$an_staticblock->title|escape:'htmlall':'UTF-8'}</span>
					{$an_staticblock->content nofilter}
				</div>
		{if $an_staticblock->link <>''}
			</a>
		{/if}
</div>