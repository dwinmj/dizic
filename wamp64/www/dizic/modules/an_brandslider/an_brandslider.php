<?php
/**
 * 2007-2014 PrestaShop
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

if (!defined('_PS_VERSION_')) {
    exit;
}

class an_brandslider extends Module
{
    const SALT = 'aLko';
    const PREFIX = 'anb_';
    const DO_SHOW_TITLE = 'AN_BRANDSLIDER_SHOW_BLOCK_TITLE';
    const TITLE = 'AN_BRANDSLIDER_TITLE';
    const MANUFACTURERS = 'AN_MANUFACTURERS_LIST';
    const MANUFACTURERS_FRONT = 'items';
    const IMPORT_CONFIGURATION_COUNT_FACTOR = 19;

    const JS_FILE = 'AN_BRANDSLIDER_JS_FILE';

    protected $_title_params = array();

    protected $_params = array(
        'displayName' => array(
                'label'=>'displayName',
                'value' => false,
                'type'=> 'switch',
                'hint' => '',
            ),
        
        'imageType' => array(
                'label'=>'imageType',
                'type'=> 'imageType',
                'hint' => '',
            ),
        'margin' => array(
                'label'=>'margin',
                'value' => 0,
                'type'=> 'number',
                'max' => 300,
                'min' => 0,
                'suffix' => 'px',
                'hint' => 'margin-right(px) on item',
            ),
        'center' => array(
                'label'=>'center',
                'value' => false,
                'type'=> 'switch',
                'hint' => 'Center item. Works well with even an odd number of items',
            ),
        'loop' => array(
                'label'=>'loop',
                'value' => false,
                'type'=> 'switch',
                'hint' => 'Infinity loop. Duplicate last and first items to get loop illusion',
            ),
        'nav' => array(
                'label'=>'nav',
                'value' => true,
                'type'=> 'switch',
                'hint' => 'Show next/prev buttons',
            ),
        'navRewind' => array(
                'label'=>'navRewind',
                'value' => true,
                'type'=> 'switch',
                'hint' => 'Go to first/last',
            ),
        'mouseDrag' => array(
                'label'=>'mouseDrag',
                'value' => true,
                'type'=> 'switch',
                'hint' => 'Mouse drag enabled',
            ),
        'touchDrag' => array(
                'label'=>'touchDrag',
                'value' => true,
                'type'=> 'switch',
                'hint' => 'Touch drag enabled',
            ),
        'dots' => array(
                'label'=>'dots',
                'value' => false,
                'type'=> 'switch',
                'hint' => 'Show dots navigation',
            ),
        'lazyLoad' => array(
                'label'=>'lazyLoad',
                'value' => false,
                'type'=> 'switch',
                'hint' => 'Lazy load images. data-src and data-src-retina for highres. Also load images into background inline style if element is not <img>',
            ),
        'autoplay' => array(
                'label'=>'autoplay',
                'value' => false,
                'type'=> 'switch'
            ),
        'autoplayTimeout' => array(
                'label'=>'autoplayTimeout',
                'value' => 5000,
                'type'=> 'number',
                'min' => 0,
                'max' => 10000,
                'hint' => 'Autoplay interval timeout',
            ),
        'autoplayHoverPause' => array(
                'label'=>'autoplayHoverPause',
                'value' => false,
                'type'=> 'switch',
                'hint' => 'Pause on mouse hover',
            ),
        'smartSpeed' => array(
                'label'=>'smartSpeed',
                'value' => 250,
                'type'=> 'number',
                'min' => 0,
                'max' => 10000,
            ),
        'responsiveRefreshRate' => array(
                'label'=>'responsiveRefreshRate',
                'value' => 200,
                'type'=> 'number',
                'hint' => 'Responsive refresh rate',
                'min' => 0,
                'max' => 10000,
            ),
    );

    protected $_responsive = array(
            0 => array(
                'items' => array(
                        'label'=>'0 px: items',
                        'value' => 1,
                        'type'=> 'number',
                        'min' => 1,
                        'max' => 50,
                        'hint' => 'The number of items you want to see on the screen',
                    ),
            ),
            768 => array(
                'items' => array(
                        'label'=>'768 px: items',
                        'value' => 3,
                        'type'=> 'number',
                        'min' => 1,
                        'max' => 50,
                        'hint' => 'The number of items you want to see on the screen',
                    ),
            ),
            992 => array(
                'items' => array(
                        'label'=>'992 px: items',
                        'value' => 5,
                        'type'=> 'number',
                        'min' => 1,
                        'max' => 50,
                        'hint' => 'The number of items you want to see on the screen',
                    ),
            ),
            1200 => array(
                'items' => array(
                        'label'=>'1200 px: items',
                        'value' => 6,
                        'type'=> 'number',
                        'min' => 1,
                        'max' => 50,
                        'hint' => 'The number of items you want to see on the screen',
                    ),
            ),
    );
    
    public function __construct()
    {
        $this->name = 'an_brandslider';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Apply Novation';
        $this->bootstrap = true;
        $this->module_root_path = _PS_MODULE_DIR_.$this->name;
        $this->configuration_source = $this->module_root_path.'/configuration.json';
        $this->module_key = '84518a68dd61b4bb924b6ddf12c95e8c';

        Module::__construct();

        $this->displayName = $this->l('AN Brand Slider: partners, manufacturers logo carousel');
        $this->description = $this->l('Shows brands that are presented in the shop');

        $this->_title_params[self::TITLE] = array(
            'col' => 3,
            'type' => 'text',
            'name' => self::TITLE,
            'label' => $this->l('Block title'),
            'lang' => true,
            'value' => ''
        );

        $this->_title_params[self::DO_SHOW_TITLE] = array(
            'type' => 'switch',
            'label' => $this->l('Show block title'),
            'name' => self::DO_SHOW_TITLE,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'active_on',
                    'value' => true,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'active_off',
                    'value' => false,
                    'label' => $this->l('No')
                )
            ),
            'value' => true
        );
    }

    public function install()
    {
        if (!$this->importConfiguration($this->configuration_source)) {
            $languages = $this->context->controller->getLanguages();
            foreach (array_merge($this->_title_params, $this->_params) as $param => $value) {
                $val = $value['value'];
                if (isset($value['lang']) && $value['lang']) {
                    foreach ($languages as $lang) {
                        $val[(int)$lang['id_lang']] = $value['value'];
                    }
                }
                
                $this->getParam($param, $val);
            }
            
            foreach ($this->_responsive as $screen_px => $items) {
                foreach ($items as $key => $item) {
                    $this->getParam($screen_px.$key, $item['value']);
                }
            }
        }

        return parent::install()
            && $this->generateJS()
            && $this->registerHook('displayHome')
            && $this->registerHook('displayHeader')
            && $this->registerHook('actionObjectLanguageAddAfter')
            && $this->hookActionObjectLanguageAddAfter()
            && $this->setManufacturers(array_map(function ($man) {
                return (int)$man['id_manufacturer'];
            }, (array)Manufacturer::getManufacturers()));
    }

    public function uninstall()
    {
        foreach (array_merge($this->_title_params, $this->_params) as $param => $value) {
            if (!Configuration::deleteByName($param)) {
                return false;
            }
        }

        Configuration::deleteByName(self::MANUFACTURERS);

        foreach ($this->_responsive as $screen_px => $items) {
            foreach ($items as $key => $item) {
                if (!Configuration::deleteByName($screen_px.$key)) {
                    return false;
                }
            }
        }
        
        @unlink($this->local_path.'views/js/'.(string)$this->getParam(self::JS_FILE));
        return parent::uninstall()
            && $this->unregisterHook("displayFooter")
            && $this->unregisterHook('displayHome')
            && $this->unregisterHook('displayHeader');
    }

    public function hookActionObjectLanguageAddAfter($params = null)
    {
        $lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
        $languages = $params !== null && $params['object'] instanceof Language && Validate::isLoadedObject($params['object']) ?
            array_merge(Language::getLanguages(0, 0, 1), array((int)$params['object']->id)) : Language::getLanguages(0, 0, 1);
            
        foreach ($this->getLangKeys() as $key) {
            $values[$lang_default] = $this->getParam($key, null, $lang_default);
            
            foreach ($languages as $id_lang) {
                $value = $this->getParam($key, null, (int)$id_lang);

                if ($value === false || empty($value)) {
                    $values[(int)$id_lang] = $values[$lang_default];
                }
            }

            $this->getParam($key, $values);
        }

        return true;
    }

    public function getLangKeys()
    {
        return array(
            static::TITLE
        );
    }
    
    public function hookDisplayHeader($params)
    {
        $this->context->controller->addJquery();
        if (version_compare(_PS_VERSION_, '1.7.0.0', '<') == 1) {
            $this->context->controller->addCss($this->_path.'views/css/owl.carousel.min.css', 'all');
            $this->context->controller->addJs($this->_path.'views/js/owl.carousel.min.js');
            $this->context->controller->addCss($this->_path.'views/css/front.css', 'all');
            $this->context->controller->addJs($this->_path.'views/js/'.(string)$this->getParam(self::JS_FILE));
        } else {
            $this->context->controller->registerStylesheet('owlcarousel-css', 'modules/'.$this->name.'/views/css/owl.carousel.min.css', array('media' => 'all', 'priority' => 150));
            $this->context->controller->registerJavascript('owlcarousel-js', 'modules/'.$this->name.'/views/js/owl.carousel.min.js', array('position' => 'bottom', 'priority' => 150));
            $this->context->controller->registerStylesheet('an-brandslider-css', 'modules/'.$this->name.'/views/css/front.css', array('media' => 'all', 'priority' => 150));
            $this->context->controller->registerJavascript('an-brandslider-js', 'modules/'.$this->name.'/views/js/'.(string)$this->getParam(self::JS_FILE), array('position' => 'bottom', 'priority' => 150));
        }
    }
    
    public function hookDisplayFooter($params = null)
    {
        return $this->hookDisplayHome($params);
    }
    
    public function hookDisplayFooterBefore($params = null)
    {
        return $this->hookDisplayHome($params);
    }

    public function hookDisplayHome($params = null)
    {
        // die(var_dump($this->importConfiguration()));
        $img_format = new ImageType((int)$this->getParam('imageType'));

        if (!isset($img_format->name)) {
            $types = ImageType::getImagesTypes('manufacturers');
            $img_format = array_shift($types);
        }

        if (isset($img_format)) {
            $img_format = is_object($img_format) ? $img_format->name : $img_format['name'];

            $_manufacturers = Manufacturer::getManufacturers();
            $items = $this->getMenuItems();

            $manufacturers = array_map(function ($item) use ($_manufacturers) {
                foreach ($_manufacturers as $_manufacturer) {
                    if ((int)$_manufacturer['id_manufacturer'] == $item) {
                        return $_manufacturer;
                    }
                }
            }, $items);
            
            foreach ($manufacturers as &$manufacturer) {
                if (version_compare(_PS_VERSION_, '1.7.0.0', '<>') == 1) {
                    $manufacturer['image'] = $this->context->language->iso_code.'-default';
                    if (file_exists(_PS_MANU_IMG_DIR_.$manufacturer['id_manufacturer'].'-'.$img_format.'.jpg')) {
                        $manufacturer['image'] = $manufacturer['id_manufacturer'];
                    }
                    $manufacturer['image'] = __PS_BASE_URI__.'img/m/'.$manufacturer['image'].'-'.$img_format.'.jpg';
                } else {
                    $image = _PS_MANU_IMG_DIR_.$manufacturer['id_manufacturer'].'.jpg';
                    $manufacturer['image'] = $this->context->language->iso_code.'-default';
                    if (file_exists($image)) {
                        $manufacturer['image'] = ImageManager::thumbnail($image, 'manufacturer_'.(int)$manufacturer['id_manufacturer'].'.'.$img_format, 350, $img_format, true, true);
                    } else {
                        $manufacturer['image'] = __PS_BASE_URI__.'img/'.$this->context->language->iso_code.'-default.jpg';
                    }
                }
            }

            if (count($manufacturers)) {
                list($sliderOptions, $an_brandslider_options) = $this->getParams();

                $this->context->smarty->assign(array(
                    'an_manufacturers' => $manufacturers,
                    'an_brandslider_options'=> $an_brandslider_options,
                    'an_slider_options' => Tools::jsonEncode($sliderOptions),
                    'doshowtitle' => (bool)$sliderOptions[self::DO_SHOW_TITLE],
                    'title' => $sliderOptions[self::TITLE]
                ));
                
                return $this->display(__FILE__, 'slider.tpl');
            }
        }
    }

    protected function generateJS()
    {
        list($sliderOptions, $an_brandslider_options) = $this->getParams();
        $languages = $this->context->controller->getLanguages();

        $export = $this->generateJSName($this->killJS());

        if ($this->getParam(self::JS_FILE, $export)) {
            $this->context->smarty->assign('an_slider_options', Tools::jsonEncode($sliderOptions));
            return @file_put_contents($this->local_path.'views/js/'.$export, $this->display($this->name, 'js_generator.tpl'));
        }

        return true;
    }

    protected function killJS()
    {
        $file = (string)$this->getParam(self::JS_FILE);
        @unlink($this->local_path.'views/js/'.$file);
        return $file;
    }

    protected function generateJSName($name)
    {
        return ($name !== false ? md5($name.self::SALT) : md5("slider")).'.js';
    }

    public function getParam($key, $value = null, $lang = null)
    {
        if (is_null($value)) {
            return Configuration::get(self::PREFIX.$key, $lang === null ? null : (int)$lang);
        }

        return Configuration::updateValue(self::PREFIX.$key, $value);
    }
    
    protected function checkType($type, $new_value)
    {
        switch ($type) {
            case 'switch':
                $new_value = (bool)$new_value;
                break;
                
            case 'text':
                $new_value = pSQL((string)$new_value);
                break;
                    
            case 'number':
                $new_value = (int)$new_value;
                break;
                
            case 'imageType':
                $new_value = pSQL((string)$new_value);
                break;

            case 'select':
                $new_value = pSQL((string)$new_value);
                break;

            default:
                $new_value = '';
        }
        
        return $new_value;
    }
    
    public function getContent()
    {
        if (Tools::getIsset($this->name)) {
            $this->setManufacturers((array)Tools::getValue(self::MANUFACTURERS_FRONT));

            foreach (array_merge($this->_params, $this->_title_params) as $key => $item) {
                if ($item['lang'] === true) {
                    $new_value = array();
                    foreach ($this->context->controller->getLanguages() as $lang) {
                        $new_value[(int)$lang['id_lang']] = $this->checkType($item['type'], Tools::getValue($key."_{$lang['id_lang']}"));
                    }
                } else {
                    $new_value = $this->checkType($item['type'], Tools::getValue($key));
                }

                $this->getParam($key, $new_value);
            }
            
            foreach ($this->_responsive as $screen_px => $items) {
                foreach ($items as $key => $item) {
                    $new_value = $this->checkType($item['type'], Tools::getValue($screen_px.$key));
                    $this->getParam($screen_px.$key, $new_value);
                }
            }

            $this->generateJS();
            $this->exportConfiguration();

            Tools::redirectAdmin('index.php?tab=AdminModules&conf=4&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.(int)(Tab::getIdFromClassName('AdminModules')).(int)$this->context->employee->id));
        }

        return $this->displayForm();
    }

    public function displayForm()
    {
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $languages = $this->context->controller->getLanguages();
        $helper = new HelperForm();

        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->title = $this->displayName;
        $helper->submit_action = $this->name;

        $fields_form = array(
            $this->getTitleForm($helper),
            $this->getManufacturersForm($helper),
            $this->getSettingsForm($helper),
            $this->getResponsiveSettingsForm($helper)
        );

        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->languages = $this->context->controller->getLanguages();
        $helper->default_form_language = (int)$this->context->language->id;
        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL(),
            'language' => array(
                'id_lang' => $language->id,
                'iso_code' => $language->iso_code
            ),
            'languages' => $languages,
            'id_language' => $this->context->language->id,
            'choices' => $this->renderChoicesSelect(),
            'selected_links' => $this->makeMenuOption(),
        );

        return $helper->generateForm($fields_form);
    }

    protected function getParams()
    {
        $sliderOptions = $an_brandslider_options = array();

        foreach (array_merge($this->_params, $this->_title_params) as $key => $item) {
            $new_value = $this->getParam($key, null, isset($item['lang']) && $item['lang'] ? $this->context->language->id : 0);
                
            if ($key != 'displayName' && $item['type'] != 'imageType') {
                $sliderOptions[$key] = $new_value;
            } else {
                $an_brandslider_options[$key] = $new_value;
            }
        }

        foreach ($this->_responsive as $screen_px => $items) {
            $sliderOptions['responsive'][$screen_px] = array();
                
            foreach ($items as $key => $item) {
                $new_value = $this->checkType($item['type'], $this->getParam($screen_px.$key));
                $sliderOptions['responsive'][$screen_px][$key] = $new_value;
            }
        }

        return array($sliderOptions, $an_brandslider_options);
    }

    protected function renderChoicesSelect()
    {
        $this->context->smarty->assign(array(
            'manufacturers' => Manufacturer::getManufacturers(false, $this->context->language->id),
            'items' => $this->getMenuItems()
        ));

        return $this->display(__FILE__, 'views/templates/admin/choices.tpl');
    }

    protected function makeMenuOption()
    {
        $this->context->smarty->assign(array(
            'id_lang' => $this->context->language->id,
            'menu_item' => $this->getMenuItems(),
            'module' => $this
        ));

        return $this->display(__FILE__, 'views/templates/admin/menu_option.tpl');
    }

    protected function getMenuItems()
    {
        $items = Tools::getValue('items');

        if (is_array($items) && count($items)) {
            return $items;
        } else {
            $shops = Shop::getContextListShopID();
            $conf = null;

            if (count($shops) > 1) {
                foreach ($shops as $key => $shop_id) {
                    $shop_group_id = Shop::getGroupFromShop($shop_id);
                    $conf .= (string)($key > 1 ? ',' : '').Configuration::get(self::MANUFACTURERS, null, $shop_group_id, $shop_id);
                }
            } else {
                $shop_id = (int)$shops[0];
                $shop_group_id = Shop::getGroupFromShop($shop_id);
                $conf = Configuration::get(self::MANUFACTURERS, null, $shop_group_id, $shop_id);
            }

            if (Tools::strlen($conf)) {
                return array_map(function ($i) {
                    return (int)$i;
                }, explode(',', $conf));
            } else {
                return array();
            }
        }
    }

    protected function setManufacturers($man_list)
    {
        $items = is_array($man_list) ? (string)implode(',', array_unique($man_list)) : (string)$man_list;
        $shops = Shop::getContextListShopID();

        if (count($shops) == 1) {
            foreach ($shops as $shop_id) {
                $group = Shop::getGroupFromShop($shop_id);
                $updated = Configuration::updateValue(self::MANUFACTURERS, $items, false, $group ? $group : null, $shop_id);
            }
        }

        return true;
    }

    protected function getTitleForm($helper)
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Title'),
                ),
                'input' => $this->getTitleFormInputs($helper),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            )
        );
    }

    protected function getManufacturersForm($helper)
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Manufacturers'),
                ),
                'input' => $this->getManufacturersFormInputs($helper),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            )
        );
    }

    protected function getSettingsForm($helper)
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Basic settings'),
                ),
                'input' => $this->getSettingsFormInputs($helper),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            )
        );
    }

    protected function getResponsiveSettingsForm($helper)
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Responsive settings'),
                ),
                'input' => $this->getResponsiveSettingsFormInputs($helper),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
               )
           );
    }

    protected function getTitleFormInputs($helper)
    {
        $fields = array(
            self::TITLE => $this->_title_params[self::TITLE],
            self::DO_SHOW_TITLE => $this->_title_params[self::DO_SHOW_TITLE]
        );

        $languages = $this->context->controller->getLanguages();

        foreach ($fields as $key => $item) {
            if (isset($item['lang']) && $item['lang']) {
                foreach ($languages as $lang) {
                    $id_lang = (int)$lang['id_lang'];
                    $helper->fields_value[$key][$id_lang] = $this->getParam($key, null, $id_lang);
                }
            } else {
                $helper->fields_value[$key] = $this->getParam($key);
            }
        }

        return $fields;
    }

    protected function getManufacturersFormInputs($helper)
    {
        return array(
            array(
                'type' => 'link_choice',
                'label' => '',
                'name' => 'link',
                'lang' => true,
            )
        );
    }

    protected function getSettingsFormInputs($helper)
    {
        $inputs = array();
        foreach ($this->_params as $key => $item) {
            $helper->fields_value[$key] = $this->getParam($key);
            
            if (!isset($item['label']) | $item['label'] == '') {
                $item['label'] = Tools::ucfirst(ltrim(preg_replace('/[A-Z]/', ' $0', $key)));
            }

            switch ($item['type']) {
                case 'imageType':
                    $inputs[$key] = array(
                        'type' => 'select',
                        'label' => $item['label'],
                        'name' => $key,
                        'options' => array(
                            'query' => ImageType::getImagesTypes('manufacturers'),
                            'id' => 'id_image_type',
                            'name' => 'name',
                        ),
                    );
                    break;
                    
                case 'switch':
                    $inputs[$key] = array(
                        'type' => 'switch',
                        'label' => $item['label'],
                        'name' => $key,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => $key.'_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => $key.'_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        ),
                    );
                    break;

                case 'select':
                    $inputs[$key] = $item;
                    break;

                case 'text':
                    $inputs[$key] = array(
                        'type' => 'text',
                        'label' => $item['label'],
                        'name' => $key,
                        'lang' => isset($item['lang']) && (bool)$item['lang']
                    );
                    break;

                case 'number':
                    $inputs[$key] = array(
                        'col' => '3',
                        'type' => 'number',
                        'label' => $item['label'],
                        'name' => $key,
                        'min' => $item['min'],
                        'max' => $item['max'],
                        'suffix' => isset($item['suffix']) ? $item['suffix'] : ''
                    );
                    break;
            }
            
            if (isset($inputs[$key], $item['hint']) && $item['hint'] != '') {
                $inputs[$key]['hint'] = $item['hint'];
            }
        }

        return $inputs;
    }

    protected function getResponsiveSettingsFormInputs($helper)
    {
        $inputs = array();

        foreach ($this->_responsive as $screen_px => $items) {
            foreach ($items as $key => $item) {
                if (!isset($item['label']) | $item['label'] == '') {
                    $item['label'] = Tools::ucfirst(ltrim(preg_replace('/[A-Z]/', ' $0', $screen_px.' px: '.$key)));
                }
                
                $key = $screen_px.$key;
                
                $helper->fields_value[$key] = $this->getParam($key);
                
                switch ($item['type']) {
                    case 'switch':
                        $inputs[$key] = array(
                            'type' => 'switch',
                            'label' => $item['label'],
                            'name' => $key,
                            'is_bool' => true,
                            'values' => array(
                                array(
                                    'id' => $key.'_on',
                                    'value' => 1,
                                    'label' => $this->l('Yes')
                                ),
                                array(
                                    'id' => $key.'_off',
                                    'value' => 0,
                                    'label' => $this->l('No')
                                )
                            ),
                        );
                        break;

                    case 'text':
                        $inputs[$key] = array(
                            'type' => 'text',
                            'label' => $item['label'],
                            'name' => $key,
                        );
                        break;

                    case 'number':
                        $inputs[$key] = array(
                            'col' => '3',
                            'type' => 'number',
                            'label' => $item['label'],
                            'name' => $key,
                            'min' => $item['min'],
                            'max' => $item['max'],
                        );
                        break;
                }
                
                if (isset($inputs[$key], $item['hint']) && $item['hint'] != '') {
                    $inputs[$key]['hint'] = $item['hint'];
                }
            }
        }

        return $inputs;
    }

    /**
     * configuration must be fully
     */
    protected function importConfiguration($configuration_source = null)
    {
        $configuration_source = $configuration_source === null ? $this->configuration_source : $configuration_source;
        $config = Tools::jsonDecode(Tools::file_get_contents($configuration_source), 1);

        if (count((array)$config) != self::IMPORT_CONFIGURATION_COUNT_FACTOR) {
            return false;
        }

        foreach (array_merge($this->_title_params, $this->_params) as $param => $value) {
            $val = array();

            if (isset($value['lang']) && $value['lang']) {
                foreach (Language::getLanguages(1, 0, 1) as $id_lang) {
                    $val[$id_lang] = $config[$param][(string)$id_lang];
                }
            } else {
                $val = $config[$param];
            }

            $this->getParam($param, $val);
        }
            
        foreach ($this->_responsive as $screen_px => $items) {
            foreach ($items as $key => $item) {
                $this->getParam($screen_px.$key, $config["responsive"][(string)$screen_px][$key]);
            }
        }

        // $this->setManufacturers($config[self::MANUFACTURERS]);
        
        return true;
    }

    protected function exportConfiguration($configuration_source = null)
    {
        $configuration_source = $configuration_source === null ? $this->configuration_source : $configuration_source;
        $languages = Language::getLanguages(1, 0, 1);

        $data = array(
            "responsive" => array()
        );

        foreach ($this->_responsive as $screen_px => $items) {
            foreach ($items as $key => $item) {
                $data["responsive"][$screen_px][$key] = $this->getParam($screen_px.$key);
            }
        }

        foreach (array_merge($this->_title_params, $this->_params) as $param => $value) {
            if (isset($value['lang']) && $value['lang']) {
                foreach (Language::getLanguages(1, 0, 1) as $id_lang) {
                    $data[$param][$id_lang] = $this->getParam($param, null, $id_lang);
                }
            } else {
                $data[$param] = $this->getParam($param);
            }
        }

        return @file_put_contents($configuration_source, Tools::jsonEncode($data));
    }
}
