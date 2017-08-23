{**
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
*  @author    Apply Novation <applynovation@gmail.com>
*  @copyright 2016-2017 Apply Novation
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{* 
default in theme Classic: 

font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif; 

*}

body {
  font-size: {$global_basicfontsize};
  line-height: {$global_BasicLineHeight};
  background: {$global_bodyBackground};
  {$global_themeFont}
}

.ui-widget.ui-menu {
    {$global_themeFont}
}


body,
p {
  color: {$global_basicfontcolor};
}

.tabs .nav-tabs .nav-link:hover,
.tabs .nav-tabs .nav-link.active,
.anthemeblocks-homeslider-desc span {
  color: {$global_basicfontcolor} !important;
}

p {
  font-size: {$global_pfontsize};
  line-height: {$global_pLineHeight};
}


.h1,
h1 {
  font-size: {$h1h6_h1FontSize};
}
.h2,
h2 {
  font-size: {$h1h6_h2FontSize};
}
.h3,
.h4,
h3,
h4 {
  font-size: {$h1h6_h3h4FontSize};
}
.h5,
h5 {
  font-size: {$h1h6_h5FontSize};
}
.h6,
h6 {
  font-size: {$h1h6_h6FontSize};
}

.block-contact .block-contact-title, .linklist .blockcms-title a, #block_myaccount_infos .myaccount-title a,
.h1,
.h2,
.h3 {
  color: {$h1h6_h1h5Color};
}

{* color: #2fb5d2; color: #208094;	*}

#header .header-nav .cart-preview.active a ,
.dropdown .expand-more,
a,
.pagination .current a {
  color: {$global_link};
}

#header .header-nav .blockcart.active a:hover,
.dropdown:hover .expand-more,
.page-my-account #content .links a:hover i,
.page-my-account #content .links a:hover,
a:focus,
a:hover,
.btn-link:focus,
.btn-link:hover,
.page-link:focus,
.page-link:hover,
a.text-primary:focus,
a.text-primary:hover {
  color: {$global_linkHover};
}

a.bg-primary:focus,
a.bg-primary:hover {
  background-color: {$global_linkHover}!important
}
.btn-primary.focus,
.btn-primary:focus,
.btn-primary:hover {
    background-color: {$global_linkHover};
}
.btn-primary.active,
.btn-primary:active,
.open>.btn-primary.dropdown-toggle {
    background-color: {$global_linkHover};
}
.tag-primary[href]:focus,
.tag-primary[href]:hover {
    background-color: {$global_linkHover}
}

{***********************************

Basic color

***********************************}
.anthemeblocks-homeslider .owl-dots .owl-dot.active span,
.anthemeblocks-homeslider .owl-dots .owl-dot:hover span {
  background: {$global_basicColor} !important;
}

#an_brandslider-block .owl-prev:hover, #an_brandslider-block .owl-next:hover {
  color: {$global_basicColor} !important;
}


.form-control:focus,
.input-group.focus {
    outline: .1875rem solid {$global_basicColor};
}

.bootstrap-touchspin .group-span-filestyle .btn-touchspin,
.group-span-filestyle .bootstrap-touchspin .btn-touchspin,
.group-span-filestyle .btn-default {
  background:  {$global_basicColor};
}

.custom-radio input[type=radio]:checked+span { 
  background-color: {$global_basicColor};
}

.search-widget form input[type=text]:focus {
  outline: 3px solid {$global_basicColor};
}

body#checkout section.checkout-step .address-item.selected {
  border: 3px solid {$global_basicColor};
}

.anthemeblocks-homeslider .owl-prev i, .anthemeblocks-homeslider .owl-next i
{
color: {$global_basicColor};
}

#products .all-product-link:hover, .featured-products .all-product-link:hover, .product-accessories .all-product-link:hover,
#two-banners .two_block .two_block_content a:hover,
#blockcart-modal .modal-header,
.pagination a.nofollow1:hover,
.pagination .current a,
#products .product-miniature .discount-percentage,
#products .product-miniature .on-sale,
#products .product-miniature .online-only,
#products .product-miniature .product-flags .new,
.featured-products .product-miniature .discount-percentage,
.featured-products .product-miniature .on-sale,
.featured-products .product-miniature .online-only,
.featured-products .product-miniature .product-flags .new,
.product-accessories .product-miniature .discount-percentage,
.product-accessories .product-miniature .on-sale,
.product-accessories .product-miniature .online-only,
.product-accessories .product-miniature .product-flags .new,
.product-miniature .product-miniature .discount-percentage,
.product-miniature .product-miniature .on-sale,
.product-miniature .product-miniature .online-only,
.product-miniature .product-miniature .product-flags .new {
  background: {$global_basicColor};
}
.products-sort-order .select-list:hover {
  background: {$global_basicColor};
}

.btn-primary.focus,
.btn-primary:focus,
.btn-primary:hover {
background: {$global_basicColor} !important;
}

#products .all-product-link,
.featured-products .all-product-link,
.product-accessories .all-product-link,
.product-miniature .all-product-link,
#two-banners .two_block .two_block_content a,
.btn-primary {
border: 2px solid {$global_basicColor} !important;
}

#products .all-product-link,
.featured-products .all-product-link,
.product-accessories .all-product-link,
.product-miniature .all-product-link,
#two-banners .two_block .two_block_content a,
.anthemeblocks-homeslider-desc .btn.btn-primary,
#product-availability .product-available,
.scroll-box-arrows .left,
.scroll-box-arrows .right,
.social-sharing li a:hover,
.page-my-account #content .links a i {
  color: {$global_basicColor};
}
#product-modal .modal-content .modal-body .product-images img:hover {
  border: 3px solid #2fb5d2;
}
li.product-flag {
  background:  {$global_basicColor};
}


.dropdown-item:focus,
.search-widget form input[type=text]:focus+button .search,
.search-widget form button[type=submit] .search:hover,
#products .highlighted-informations .quick-view:hover,
.featured-products .highlighted-informations .quick-view:hover,
.product-accessories .highlighted-informations .quick-view:hover,
.product-miniature .highlighted-informations .quick-view:hover,
.block-categories .collapse-icons .add:hover,
.block-categories .collapse-icons .remove:hover,
.block-categories .arrows .arrow-down:hover,
.block-categories .arrows .arrow-right:hover,
.cart-grid-body a.label:hover
.product-price,
#blockcart-modal .product-name {
  color: {$global_basicColor};
}
.block_newsletter form input[type=text]:focus {
  outline: 3px solid {$global_basicColor};
}
.block_newsletter form input[type=text]:focus+button .search {
  color: {$global_basicColor};
}
.block_newsletter form button[type=submit] .search:hover {
  color: {$global_basicColor};
}
.block_newsletter form input[type=text]:focus {
 border: 3px solid {$global_basicColor};
}
.block-social li a span:hover:before {
  color: {$global_basicColor};
}

@media (max-width: 767px) {
	#header .header-nav .user-info .logged {
	  color: {$global_basicColor};
	}
}
.btn-primary {
  color: {$global_basicColor};
}

.btn-primary.disabled.focus,
.btn-primary.disabled:focus,
.btn-primary.disabled:hover,
.btn-primary:disabled.focus,
.btn-primary:disabled:focus,
.btn-primary:disabled:hover {
    background-color: {$global_basicColor};
}
.btn-outline-primary {
    color: {$global_basicColor};
    border-color: {$global_basicColor};
}
.btn-outline-primary.active,
.btn-outline-primary.focus,
.btn-outline-primary:active,
.btn-outline-primary:focus,
.btn-outline-primary:hover,
.open>.btn-outline-primary.dropdown-toggle {
    background-color: {$global_basicColor};
    border-color: {$global_basicColor};
}
.btn-link {
  color: {$global_basicColor};
}
.dropdown-item.active,
.dropdown-item.active:focus,
.dropdown-item.active:hover {
  background-color: {$global_basicColor};
}
.nav-pills .nav-item.open .nav-link,
.nav-pills .nav-item.open .nav-link:focus,
.nav-pills .nav-item.open .nav-link:hover,
.nav-pills .nav-link.active,
.nav-pills .nav-link.active:focus,
.nav-pills .nav-link.active:hover {
  background-color: {$global_basicColor};
}
.card-primary {
  background-color: {$global_basicColor};
  border-color: {$global_basicColor};
}
.card-outline-primary {
  border-color: {$global_basicColor};
}
.page-item.active .page-link,
.page-item.active .page-link:focus,
.page-item.active .page-link:hover {
  background-color: {$global_basicColor};
  border-color: {$global_basicColor};
}
.tag-primary {
  background-color: {$global_basicColor};
}
.page-link {
  color: {$global_basicColor};
}
.bg-primary {
    background-color: {$global_basicColor}!important
}
.text-primary {
    color: {$global_basicColor}!important;
}


{***********************************

Product

***********************************}
#products .product-title a,
.featured-products .product-title a,
.product-accessories .product-title a,
.product-miniature .product-title a {
  color: {$product_titleCatalogColor};
  font-size: {$product_titleCatalogFontSize};
}

.page-product h1 {
  font-size: {$product_titleFontSize};
}

#products .product-price-and-shipping,
.featured-products .product-price-and-shipping,
.product-accessories .product-price-and-shipping,
.product-miniature .product-price-and-shipping {
  color: {$product_priceColor};
  font-size: {$product_priceFontSize};
}
.current-price {
  color: {$product_priceColor};
}
.featured-products .regular-price,
.product-accessories .regular-price,
.product-miniature .regular-price {
 color: {$product_oldPriceColor};
 font-size: {$product_oldPriceFontSize};
}
#products .regular-price {
  color: {$product_oldPriceColor};
}
.product-discount {
 color: {$product_oldPriceColor};
}




#header {
  background: {$header_headerBackground} !important; 
}

.header-nav {
  background: {$header_navBackground} !important; 
  font-size: {$header_fontSizeNav} !important;  
}
@media (max-width: 767px) {
    #header .header-top {
        background: {$header_navBackground}; 
    }
}

{if $header_logoMiddle == '1'}
#_desktop_logo {
  text-align: center;
  padding-bottom: 10px;
}
{/if}

#_desktop_top_menu {
  background: {$topmenu_background} !important; 
  font-size: {$topmenu_fontSize} !important;  
}

{if $topmenu_stickyMenu == '1'}
/* fixed-menu */
@media (max-width: 1920px) and (min-width: 1200px) {
  .fixed-menu {
    z-index: 9;
	background: rgba(0,0,0,0.4);
    padding-top: 0px!important;
    position: fixed !important;
    top: 0;
    left: 0;
	width: 100%;
  }
  #top-menu {
    margin-bottom: 0px !important;
  }
}
{/if}

#wrapper {
  background: {$wrapper_background};
}

.block_newsletter {
  background: {$newslet_background};
}

.footer-container {
  background: {$footer_footerBackground};
}

.copyright-container {
  background: {$copyright_copyrightBackground};
}


{*  Page load progress bar  *}
{if $pageLoadProgressBar_status == '1'}

#nprogress {
  pointer-events: none;
}

#nprogress .bar {
  background: {$pageLoadProgressBar_color};

  position: fixed;
  z-index: 1031;
  top: 0;
  left: 0;

  width: 100%;
  height: 2px;
}

/* Fancy blur effect */
#nprogress .peg {
  display: block;
  position: absolute;
  right: 0px;
  width: 100px;
  height: 100%;
  box-shadow: 0 0 10px {$pageLoadProgressBar_color}, 0 0 5px {$pageLoadProgressBar_color};
  opacity: 1.0;

  -webkit-transform: rotate(3deg) translate(0px, -4px);
      -ms-transform: rotate(3deg) translate(0px, -4px);
          transform: rotate(3deg) translate(0px, -4px);
}

/* Remove these to get rid of the spinner */
#nprogress .spinner {
  display: block;
  position: fixed;
  z-index: 1031;
  top: 15px;
  right: 15px;
}

#nprogress .spinner-icon {
  width: 18px;
  height: 18px;
  box-sizing: border-box;

  border: solid 2px transparent;
  border-top-color: {$pageLoadProgressBar_color};
  border-left-color: {$pageLoadProgressBar_color};
  border-radius: 50%;

  -webkit-animation: nprogress-spinner 400ms linear infinite;
          animation: nprogress-spinner 400ms linear infinite;
}

.nprogress-custom-parent {
  overflow: hidden;
  position: relative;
}

.nprogress-custom-parent #nprogress .spinner,
.nprogress-custom-parent #nprogress .bar {
  position: absolute;
}

@-webkit-keyframes nprogress-spinner {
  0%   { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}
@keyframes nprogress-spinner {
  0%   { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
{/if}