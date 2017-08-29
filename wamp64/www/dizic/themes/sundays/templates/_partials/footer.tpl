{**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div class="container">
  <div class="row">
		<div class="col-sm-12">
			{block name='hook_footer_before'}
			  {hook h='displayFooterBefore'}
			{/block}
		</div>
  </div>
</div>
<div class="footer-container">
  <div class="container">
    <div class="row">
        <div class="col-md-3">
            <p><img src="{$urls.img_ps_url}dizic-logo-footer.png" alt="logo dizic" title="logo dizic" /></p>
            <div class="col-xs-12">
                <div>2F., No.240, Minsheng W. Rd.</div>
                <div>Taipei City, TAIWAN</div>
                <div>10356</div>
                <div>Phone: +886-2-2550-2372</div>
                <div>Fax: +886-2-2511-3822</div>
                <div><a class="underline" href="mailto:sales.asia@dizic.com" title="sales.asia@dizic.com">sales.asia@dizic.com</a></div>
            </div>
        </div>
      {block name='hook_footer'}
        {hook h='displayFooter'}
      {/block}
	  <div class="col-md-4 right_ater_footer">
      {block name='hook_footer_after'}
        {hook h='displayFooterAfter'}
      {/block}
      <div class="col-xs-12 margin-top-20">
            {l s='Copyright%copyright% %year% - DiZiC' sprintf=['%year%' => 'Y'|date, '%copyright%' => '©'] d='Shop.Theme'}
      </div>
    </div>
    </div>

  </div>
</div>