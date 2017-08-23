<div id="banner-bottom" class="row">
	<div class="col-sm-12">
		<div class="block">
		{if $an_staticblock->link <>''}
			<a href="{$an_staticblock->link}">
		{/if}
			{if $an_staticblock->getImageLink()<>''}
				<img src="{$an_staticblock->getImageLink()}" alt="{$an_staticblock->title|escape:'htmlall':'UTF-8'}" width="100%">
				
			{/if}
		{if $an_staticblock->link <>''}
			</a>
		{/if}
		<div class="figcaption"></div>
		</div>
	</div>						
</div>