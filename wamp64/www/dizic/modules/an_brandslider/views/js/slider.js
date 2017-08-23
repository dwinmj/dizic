
/**
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2016 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*
* Don't forget to prefix your containers with your own identifier
* to avoid any conflicts with others containers.
*/

var an_brandslider_params = {"margin":0,"loop":true,"center":false,"nav":true,"navRewind":true,"mouseDrag":true,"touchDrag":true,"pullDrag":true,"freeDrag":true,"stagePadding":0,"autoWidth":false,"startPosition":"0","slideBy":"1","dots":false,"lazyLoad":false,"lazyContent":false,"autoplay":false,"autoplayTimeout":5000,"autoplayHoverPause":false,"smartSpeed":250,"responsiveRefreshRate":200,"animateOut":"bounce","animateIn":"bounce","responsive":{"0":{"items":1},"768":{"items":1},"992":{"items":5},"1200":{"items":6}}};
$(document).ready(function(){ $('.an_brandslider-items').owlCarousel(an_brandslider_params); });