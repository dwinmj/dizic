<?php
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
*  @author    Apply Novation <applynovation@gmail.com>
*  @copyright 2016-2017 Apply Novation
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

$module = $this;

$animateCss = array(
    array(
        'label' => 'none',
        'query' => array(
            'none' => 'none',
        ),
    ),
    array(
        'label' => 'Attention Seekers',
        'query' => array(
			'wow bounce' => 'bounce',
			'wow flash' => 'flash',
			'wow pulse' => 'pulse',
			'wow rubberBand' => 'rubberBand',
			'wow shake' => 'shake',
			'wow headShake' => 'headShake',
			'wow swing' => 'swing',
			'wow tada' => 'tada',
			'wow wobble' => 'wobble',
			'wow jello' => 'jello',
        ),
    ),
    array(
        'label' => 'Bouncing Entrances',
        'query' => array(
			'wow bounceIn' => 'bounceIn',
			'wow bounceInDown' => 'bounceInDown',
			'wow bounceInLeft' => 'bounceInLeft',
			'wow bounceInRight' => 'bounceInRight',
			'wow bounceInUp' => 'bounceInUp',
        ),
    ),
    array(
        'label' => 'Bouncing Exits',
        'query' => array(
			'wow bounceOut' => 'bounceOut',
			'wow bounceOutDown' => 'bounceOutDown',
			'wow bounceOutLeft' => 'bounceOutLeft',
			'wow bounceOutRight' => 'bounceOutRight',
			'wow bounceOutUp' => 'bounceOutUp',
        ),
    ),
    array(
        'label' => 'Fading Entrances',
        'query' => array(
			'wow fadeIn' => 'fadeIn',
			'wow fadeInDown' => 'fadeInDown',
			'wow fadeInDownBig' => 'fadeInDownBig',
			'wow fadeInLeft' => 'fadeInLeft',
			'wow fadeInLeftBig' => 'fadeInLeftBig',
			'wow fadeInRight' => 'fadeInRight',
			'wow fadeInRightBig' => 'fadeInRightBig',
			'wow fadeInUp' => 'fadeInUp',
			'wow fadeInUpBig' => 'fadeInUpBig',
        ),
    ),
    array(
        'label' => 'Fading Exits',
        'query' => array(
			'wow fadeOut' => 'fadeOut',
			'wow fadeOutDown' => 'fadeOutDown',
			'wow fadeOutDownBig' => 'fadeOutDownBig',
			'wow fadeOutLeft' => 'fadeOutLeft',
			'wow fadeOutLeftBig' => 'fadeOutLeftBig',
			'wow fadeOutRight' => 'fadeOutRight',
			'wow fadeOutRightBig' => 'fadeOutRightBig',
			'wow fadeOutUp' => 'fadeOutUp',
			'wow fadeOutUpBig' => 'fadeOutUpBig',
        ),
    ),
    array(
        'label' => 'Flippers',
        'query' => array(
			'wow flipInX' => 'flipInX',
			'wow flipInY' => 'flipInY',
			'wow flipOutX' => 'flipOutX',
			'wow flipOutY' => 'flipOutY',
        ),
    ),
    array(
        'label' => 'Lightspeed',
        'query' => array(
			'wow lightSpeedIn' => 'lightSpeedIn',
			'wow lightSpeedOut' => 'lightSpeedOut',
        ),
    ),
    array(
        'label' => 'Rotating Entrances',
        'query' => array(
			'wow rotateIn' => 'rotateIn',
			'wow rotateInDownLeft' => 'rotateInDownLeft',
			'wow rotateInDownRight' => 'rotateInDownRight',
			'wow rotateInUpLeft' => 'rotateInUpLeft',
			'wow rotateInUpRight' => 'rotateInUpRight',
        ),
    ),
    array(
        'label' => 'Rotating Exits',
        'query' => array(
			'wow rotateOut' => 'rotateOut',
			'wow rotateOutDownLeft' => 'rotateOutDownLeft',
			'wow rotateOutDownRight' => 'rotateOutDownRight',
			'wow rotateOutUpLeft' => 'rotateOutUpLeft',
			'wow rotateOutUpRight' => 'rotateOutUpRight',
        ),
    ),
    array(
        'label' => 'Specials',
        'query' => array(
			'wow hinge' => 'hinge',
			'wow rollIn' => 'rollIn',
			'wow rollOut' => 'rollOut',
        ),
    ),
    array(
        'label' => 'Sliding Entrances',
        'query' => array(
			'wow slideInDown' => 'slideInDown',
			'wow slideInLeft' => 'slideInLeft',
			'wow slideInRight' => 'slideInRight',
        ),
    ),
    array(
        'label' => 'Sliding Entrances',
        'query' => array(
			'wow slideInUp' => 'slideInUp',
			'wow slideOutDown' => 'slideOutDown',
			'wow slideOutLeft' => 'slideOutLeft',
			'wow slideOutRight' => 'slideOutRight',
			'wow slideOutUp' => 'slideOutUp',
        ),
    ),
    array(
        'label' => 'Zoom Entrances',
        'query' => array(
			'wow zoomIn' => 'zoomIn',
			'wow zoomInDown' => 'zoomInDown',
			'wow zoomInLeft' => 'zoomInLeft',
			'wow zoomInRight' => 'zoomInRight',
			'wow zoomInUp' => 'zoomInUp',
        ),
    ),
    array(
        'label' => 'Zoom Exits',
        'query' => array(
			'wow zoomOut' => 'zoomOut',
			'wow zoomOutDown' => 'zoomOutDown',
			'wow zoomOutLeft' => 'zoomOutLeft',
			'wow zoomOutRight' => 'zoomOutRight',
			'wow zoomOutUp' => 'zoomOutUp',
        ),
    ),
);

$fontSizes = array(
   '10px',
   '11px',
   '12px',   
   '13px',   
   '14px',
   '15px',
   '16px',
   '17px',
   '18px',
   '19px',
   '20px',
   '21px',
   '22px',
   '23px',
   '24px',
   '25px',
   '26px',
   '27px',
   '28px',
   '29px',
   '30px',
   '31px',
   '32px',
   '33px',
   '34px',
   '35px',
   '36px',
   '37px',
   '38px',
   '39px',
   '40px',
   '41px',
   '42px',
   '43px',
   '44px',
   '45px',
   '46px',
   '47px',
   '48px',
   '49px',
   '50px',
);

return array(
    array(
        'legend' => array(
            'title' => 'Main',
            'class' => 'an_theme-global',
            'id' => 'an_themeglobal'
        ),

        'fields' => array(
		'pageLoadProgressBar' => array(
                'title' => $module->l('Global Parameters'),
                'options' => array(
                    'status' => array(
                        'title' => $module->l('Page load progress bar'),
                        'description' => $module->l(''),
                        'source' => 'switch',
						'type' => 'fileAdd',
						'files' => array(
							array(
							  'position' => 'bottom',
							  'path' => 'views/js/nprogress.js',
							  'server' => 'local',
							  'priority' => 200
							),
						  ),
						),
                    'color' => array(
                        'title' => $module->l('Color'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#2fb5d2',
                    ),  
        ),
      ),
            'global' => array(
                'title' => $module->l('Global Parameters'),
                'options' => array(
                    'themeFont' => array(
                        'title' => $module->l('Font from theme'),
                        'description' => $module->l('Please choose font'),
                        'source' => 'select',
                        'default' => 'opensans',
                        'type' => 'font',
                    ), 
                    'basicColor' => array(
                        'title' => $module->l('Basic Color'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#2fb5d2',
                    ),  
                    'bodyBackground' => array(
                        'title' => $module->l('body Background'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#ffffff',
                    ),   
                    'link' => array(
                        'title' => $module->l('Link'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#2fb5d2',
                    ),					
                    'linkHover' => array(
                        'title' => $module->l('Link hover'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#208094',
                    ),   
                    'basicfontcolor' => array(
                        'title' => $module->l('Basic font color'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#878787',
                    ),  
                    'basicfontsize' => array(
                        'title' => $module->l('Basic font size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '16px',
                    ),
                    'BasicLineHeight' => array(
                        'title' => $module->l('Basic line height'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '16px',
                    ),
                    'pfontsize' => array(
                        'title' => $module->l('tag p font size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '16px',
                    ),
                    'pLineHeight' => array(
                        'title' => $module->l('tag p line height'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '16px',
                    ),
                ),
            ),
            'product' => array(
                'title' => $module->l('Product'),
                 'options' => array(
                    'titleCatalogColor' => array(
                        'title' => $module->l('Product title in catalog color'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#acaaa6',
                    ),
                    'titleCatalogFontSize' => array(
                        'title' => $module->l('Product title in catalog font-size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '16px',
                    ),
                    'titleFontSize' => array(
                        'title' => $module->l('Product Title in product page font-size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '20px',
                    ),
					//////
                    'priceColor' => array(
                        'title' => $module->l('Price color'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#414141',
                    ),
                    'priceFontSize' => array(
                        'title' => $module->l('Price font-size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '20px',
                    ),
                    'oldPriceColor' => array(
                        'title' => $module->l('Non-discount price color'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#acaaa6',
                    ),
                    'oldPriceFontSize' => array(
                        'title' => $module->l('Non-discount font-size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '20px',
                    ),
					///
                ), 
            ),
			///////////////////////////////
            'h1h6' => array(
                'title' => $module->l('H1-H6'),
                'options' => array(
                    'h1h5Color' => array(
                        'title' => $module->l('h1-h5 color'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#414141',
                    ),
                    'h1FontSize' => array(
                        'title' => $module->l('H1 font-size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '22px',
                    ),
                    'h2FontSize' => array(
                        'title' => $module->l('H2 font-size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '20px',
                    ),
                    'h3h4FontSize' => array(
                        'title' => $module->l('H3-H4 font-size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '18px',
                    ),
                    'h5FontSize' => array(
                        'title' => $module->l('H5 font-size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '14px',
                    ),
                    'h6FontSize' => array(
                        'title' => $module->l('H6 font-size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '15px',
                    ),
                ),
            ), 
        ),
    ),
    array(
        'legend' => array(
            'title' => 'Header',
            'class' => 'an-theme-header',
            'id' => 'anthemeheader',
            'live' => true,
            'liveTitle' => 'Header test',
        ),
        
        

        'fields' => array(
            'header' => array(
                'title' => $module->l('Header Styles'),
                'options' => array(
                    'navBackground' => array(
                        'title' => $module->l('Background Nav'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#ebebeb',
                    ),
                    'fontSizeNav' => array(
                        'title' => $module->l('Font Size Nav'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '16px',
                    ),
                    'headerBackground' => array(
                        'title' => $module->l('Background Header'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#ffffff',
                        'live' => array(
                            'status' => true,
                            'selector' => '#header',
                            'css' => 'background-color: %s !important; color: %s'
                        ),
                    ),      
                    'logoMiddle' => array(
                        'title' => $module->l('Logo in the middle'),
                        'description' => $module->l(''),
                        'source' => 'switch',
                    ),
                )
            ),
            'topmenu' => array(
                'title' => $module->l('Top horizontal menu'),
                'options' => array(
                    'background' => array(
                        'title' => $module->l('Background'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#ffffff',
                    ),
                    'fontSize' => array(
                        'title' => $module->l('Font Size'),
                        'description' => $module->l(''),
                        'source' => 'select',
                        'options' => $fontSizes,
                        'default' => '16px',
                        'live' => array(
                            'status' => true,
                            'selector' => '#top-menu',
                            'css' => 'font-size: %s !important'
                        )
                    ),
                    'stickyMenu' => array(
                        'title' => $module->l('Sticky Menu'),
                        'description' => $module->l(''),
                        'source' => 'switch',
						'type' => 'fileAdd',
						'files' => array(
							array(
							  'position' => 'bottom',
							  'path' => 'views/js/stickymenu.js',
							  'server' => 'local',
							  'priority' => 200
							),
							),
                    ),

                )
            ),  
        ),
    ),
    /**
     * 
     */
    array(
        'legend' => array(
            'title' => 'wrapper',
            'class' => 'an_theme-wrapper',
            'id' => 'an_themecontainer',
            'live' => true,
            'liveTitle' => 'wrapper test',
        ),

        'fields' => array(
            'wrapper' => array(
                'title' => $module->l('Main'),
                 'options' => array(
                    'background' => array(
                        'title' => $module->l('Background'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#ebebeb',
					//	'allow_empty' => true
                    ),
                ), 
            ),
            
            'newslet' => array(
                'title' => $module->l('Newsletter'),
                'options' => array(
                    'background' => array(
                        'title' => $module->l('Background color'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#ebebeb',
					//	'allow_empty' => true
                    ),
                )
            ), 
            
        ),
    ),  
    
    
    

    
    
    
    array(
        'legend' => array(
            'title' => 'Footer',
            'class' => 'an_theme-footer',
            'id' => 'anthemefooter'
        ),

        'fields' => array(
            'footer' => array(
                'title' => $module->l('Footer'),
                'options' => array(
                    'footerBackground' => array(
                        'title' => $module->l('Footer Background'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#ffffff',
                    ),
                ),
            ),
            'copyright' => array(
                'title' => $module->l('Copyright'),
                'options' => array(
                    'copyrightBackground' => array(
                        'title' => $module->l('Copyright Background'),
                        'description' => $module->l(''),
                        'source' => 'picker',
                        'default' => '#ffffff',
                    ),
                ),
            ),
        ),
    ),  
    


);
