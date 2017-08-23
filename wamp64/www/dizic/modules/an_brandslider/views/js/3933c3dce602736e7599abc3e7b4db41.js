/**
 * 2007-2017 PrestaShop
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
 */

var an_brandslider_params = JSON.parse("{\"margin\":0,\"center\":false,\"loop\":false,\"nav\":true,\"navRewind\":true,\"mouseDrag\":true,\"touchDrag\":true,\"dots\":true,\"lazyLoad\":false,\"autoplay\":false,\"autoplayTimeout\":5000,\"autoplayHoverPause\":false,\"smartSpeed\":250,\"responsiveRefreshRate\":200,\"AN_BRANDSLIDER_TITLE\":\"\",\"AN_BRANDSLIDER_SHOW_BLOCK_TITLE\":true,\"responsive\":{\"0\":{\"items\":1},\"768\":{\"items\":3},\"992\":{\"items\":5},\"1200\":{\"items\":6}}}");
an_brandslider_params['navText'] = ['<i class="material-icons">&#xE314;</i>','<i class="material-icons">&#xE315;</i>'];
an_brandslider_params['navContainer'] = '.owl-stage-outer';
$(document).ready(function(){ $('.an_brandslider-items').owlCarousel(an_brandslider_params); });