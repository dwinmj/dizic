{*
* 2007-2015 PrestaShop
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
{*
{foreach from=$tabs item=tab_content}
    {$tab_content->id|intval}
    {$tab_content->title.$id_lang|escape:'htmlall':'UTF-8'}
    {$tab_content->content.$id_lang|escape:'htmlall':'UTF-8' nofilter}
    {$tab_content->active|intval}
{/foreach}
*}
{foreach from=$tabs item=tab_content}
<section class="page-product-box">
    <h3 class="page-product-heading">{$tab_content->title|escape:'htmlall':'UTF-8'}</h3>
    <div class="rte">{$tab_content->content nofilter}</div>
</section> 
{/foreach}