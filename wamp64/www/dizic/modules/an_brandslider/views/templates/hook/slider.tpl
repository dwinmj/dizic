{*
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    Apply Novation (Artem Zwinger)
 *  @copyright 2016-2017 Apply Novation
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *}

<div id="an_brandslider-block" class="clearfix">
	{if $doshowtitle }
	<div class="an_brandslider-title">{$title|escape:'htmlall':'UTF-8'}</div>
	{/if}
	<div class="owl-carousel an_brandslider-items">
		{foreach from=$an_manufacturers item=manufacturer}
		<div class="an_brandslider-item">
			<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'html':'UTF-8'}" title="{l s='More about %s' sprintf=[$manufacturer.name] mod='an_brandslider'}">
				{if version_compare($smarty.const._PS_VERSION_, '1.7.0.0', '<>')}
					<img src="{$manufacturer.image|escape:'html':'UTF-8' }" alt="" />
				{else}
					{$manufacturer.image|escape:'quotes':'UTF-8'}
				{/if}
				{if isset($an_brandslider_options.displayName) && $an_brandslider_options.displayName == true}
					<span>{$manufacturer.name|escape:'html':'UTF-8'}</span>
				{/if}
			</a>
		</div>
		{/foreach}
	</div>
</div>
