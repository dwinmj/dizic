<?php
/**
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
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

spl_autoload_register(function ($class_name) {
    if (mb_strstr($class_name, 'ANPT') && file_exists(_PS_MODULE_DIR_.'anproductextratabs/models/'.$class_name.'.php')) {
        include(_PS_MODULE_DIR_.'anproductextratabs/models/'.$class_name.'.php');
    }
});

class Anproductextratabs extends Module
{
    const AJAX_CONTROLLER_NAME = 'AdminAnProductTabs';
    const CONTROLLER_NAME = 'AdminAnProductTabsEdit';

    //common edit form
    const COMMON_NAME = 'name';
    const COMMON_ID = 'id';

    const DEFAULT_CONTENT_OFFSET = 16;
    const DEFAULT_CONTENT_TITLE = 'default_content_title';
    const DEFAULT_CONTENT_CONTENT = 'default_content_content';

    const CONTENT_ID = 'content_id';
    const CONTENT_OFFSET = 8;
    const CONTENT_TITLE = 'content_title';
    const CONTENT_CONTENT = 'content_content';
    const CONTENT_ACTIVE = 'content_active';

    const EDIT_ARGUMENT = 'anpt_edit';
    const DELETE_ARGUMENT = 'anpt_delete';

    const PREFIX = 'ANPRODUCTEXTRATABS_';
    const VIEW_TYPE = 'VIEW_TYPE';
    const VIEW_TYPE_DEFAULT = 'default';
    const VIEW_TYPE_TABS = 'tabs';
    const CONFIGURATION_SUBMIT = 'submitAnproductextratabsModule';

    protected $submit_action = '';
    protected $views_prefix_admin = '';
    protected $views_prefix_hook = '';
    protected $views_path_admin = '';
    protected $views_path_hook = '';
    protected $media_path = '';
    protected $messages = array();

    public function __construct()
    {
        $this->name = 'anproductextratabs';
        $this->tab = 'front_office_features';
        $this->version = '1.0.3';
        $this->author = 'Apply Novation';
        $this->need_instance = 1;
        $this->default_language = Language::getLanguage(Configuration::get('PS_LANG_DEFAULT'));
        $this->languages = Language::getLanguages();
        $this->bootstrap = true;
        $this->module_key = '3b466206aa8f1f635aaa18f9c1523fd8';

        parent::__construct();

        $this->submit_action = $this->name.'_edit_form';

        $this->views_prefix_admin = 'views/templates/admin/'.(version_compare(_PS_VERSION_, '1.7.0.0', '<') ? '1.6' : '1.7').'/';
        $this->views_prefix_hook = 'views/templates/hook/'.(version_compare(_PS_VERSION_, '1.7.0.0', '<') ? '1.6' : '1.7').'/';
        $this->views_path_admin = $this->local_path.$this->views_prefix_admin;
        $this->views_path_hook = $this->local_path.$this->views_prefix_hook;

        $this->displayName = $this->l('AN Product Extra Tabs Premium');
        $this->description = $this->l('The module creates additional description tabs with any format of content.');
        
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall the module?');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);

        $this->media_path = $this->local_path.'media';

        $this->messages = array(
            'update_order' => array(
                'success' => $this->l('The order has been updated successfully'),
                'error' => $this->l('An error occurred')
            ),
            'update' => array(
                'success' => $this->l('The tab has been updated successfully'),
                'error' => $this->l('An error occurred')
            ),
            'create' => array(
                'success' => $this->l('The tab has been created successfully'),
                'error' => $this->l('An error occurred')
            ),
            'delete' => array(
                'success' => $this->l('The tab has been deleted successfully'),
                'error' => $this->l('An error occurred'),
                'assurance' => $this->l('Are you sure?')
            ),
            'std' => array(
                'success' => $this->l('Process was completed successfully'),
                'error' => $this->l('An error occurred')
            ),
            'list_loaded' => array(
                'success' => $this->l('The list was generated successfully'),
                'error' => $this->l('An error occurred')
            )
        );

        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));

        $this->context->smarty->assign(array(
            $this->name.'_msg' => Tools::jsonEncode($this->messages),
            'anpt_tinymce_format' => '{"format": "raw"}',
            'language' => array(
                'id_lang' => $language->id,
                'iso_code' => $language->iso_code
            )
        ));
    }

    protected function registerController()
    {
        $tab = new Tab();
        $tab->active = true;
            
        foreach ((array)Language::getLanguages(1, 0, 1) as $lang) {
            $tab->name[$lang] = 'anproductextratabs';
        }

        $tab->class_name = self::AJAX_CONTROLLER_NAME;
        $tab->module = $this->name;
        $tab->id_parent = -1;

        return (bool)$tab->add();
    }

    protected function unregisterController()
    {
        if ($_tab = (int)Tab::getIdFromClassName(self::AJAX_CONTROLLER_NAME)) {
            $tab = new Tab($_tab);
            return $tab->delete();
        }

        return true;
    }

    public function install()
    {
        if (file_exists($this->local_path.'sql/install.php')) {
            include($this->local_path.'sql/install.php');
        } else {
            return false;
        }

        return parent::install()
            && $this->getParam(self::VIEW_TYPE, self::VIEW_TYPE_DEFAULT)
            && $this->registerHook('header')
            && (version_compare(_PS_VERSION_, '1.7.0.0', '<') ? $this->registerHook('displayFooterProduct') : $this->registerHook('displayProductExtraContent'))
            && $this->registerHook('actionAdminControllerSetMedia')
            && $this->registerHook('actionProductUpdate')
            && $this->registerHook('displayAdminProductsExtra')
            && $this->registerHook('backOfficeHeader')
            && $this->registerController();
    }

    public function uninstall()
    {
        if (file_exists($this->local_path.'sql/uninstall.php')) {
            include($this->local_path.'sql/uninstall.php');
        } else {
            return false;
        }

        return parent::uninstall()
            && $this->unregisterController()
            && $this->unregisterHook('header')
            && (version_compare(_PS_VERSION_, '1.7.0.0', '<') ? $this->unregisterHook('displayFooterProduct') : $this->unregisterHook('displayProductExtraContent'))
            && $this->unregisterHook('actionAdminControllerSetMedia')
            && $this->unregisterHook('actionProductUpdate')
            && $this->unregisterHook('displayAdminProductsExtra')
            && $this->unregisterHook('backOfficeHeader');
    }

    public function getContent()
    {
        $this->context->smarty->assign(array(
            $this->name.'_theme_url' => $this->context->link->getAdminLink(self::AJAX_CONTROLLER_NAME)
        ));

        if (Tools::isSubmit(self::CONFIGURATION_SUBMIT)) {
            if (Tools::getIsset(self::VIEW_TYPE)) {
                $this->getParam(self::VIEW_TYPE, Tools::getValue(self::VIEW_TYPE));
            }
        } else if (Tools::isSubmit($this->submit_action)) {
            $this->postProcess();
        }

        if (Tools::getIsset(self::EDIT_ARGUMENT)) {
            $id = (int)Tools::getValue(self::EDIT_ARGUMENT, 0);
            $collection = new ANPTTabCollection();
            return $this->renderEditForm($id > 0 ? $collection->byId($id)->loadDefaultContent()->getFirst() : new ANPTTab());
        }

        if (Tools::getIsset(self::DELETE_ARGUMENT)) {
            $id = (int)Tools::getValue(self::DELETE_ARGUMENT, 0);
            $collection = new ANPTTabCollection();
            $this->deletionProcess($id > 0 ? $collection->byId($id)->getFirst() : null);
        }

        return (version_compare(_PS_VERSION_, '1.7.0.0', '<') ? $this->renderConfigForm() : '').$this->renderTabList();
    }

    protected function renderTabList()
    {
        $this->context->smarty->assign(array(
            'collection' => new ANPTTabCollection(),
            'edit_url' => Context::getContext()->link->getAdminLink('AdminModules').'&configure='.$this->name.'&'.self::EDIT_ARGUMENT,
            'delete_url' => Context::getContext()->link->getAdminLink('AdminModules').'&configure='.$this->name.'&'.self::DELETE_ARGUMENT
        ));
        
        return $this->display(__FILE__, $this->views_prefix_admin.'tab_list.tpl');
    }

    protected function renderConfigForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = $this->getParam('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = self::CONFIGURATION_SUBMIT;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => array(
                self::VIEW_TYPE => $this->getParam(self::VIEW_TYPE)
            ),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array(
            array(
                'form' => array(
                    'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                    ),
                    'input' => array(
                        array(
                            'col' => 1,
                            'type' => 'select',
                            'desc' => $this->l('Select a view type'),
                            'name' => self::VIEW_TYPE,
                            'label' => $this->l('View type'),
                            'options' => array(
                                'query' => array(
                                    array(
                                        'value' => self::VIEW_TYPE_DEFAULT,
                                        'name' => 'Blocks'
                                    ),
                                    array(
                                        'value' => self::VIEW_TYPE_TABS,
                                        'name' => 'Tabs'
                                    )
                                ),
                                'id' => 'value',
                                'name' => 'name'
                            ),
                        )
                    ),
                    'submit' => array(
                        'title' => $this->l('Save'),
                    ),
                ),
            )
        ));
    }

    protected function getParam($key, $value = null)
    {
        return $value === null ? Configuration::get(self::PREFIX.$key) : Configuration::updateValue(self::PREFIX.$key, $value);
    }

    protected function renderEditForm(ANPTTab $tab = null)
    {
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $languages = $this->context->controller->getLanguages();
        $helper = new HelperForm();

        $helper->module = $this;

        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;

        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->title = $this->displayName;
        $helper->submit_action = $this->submit_action;

        $fields_form = array(
            array(
                'form' => array(
                    'legend' => array(
                        'title' => !isset($tab) ? $this->l('Add new tab') : $this->l('Edit tab '.$tab->name),
                    ),
                    'input' => $this->getEditDefaultFormInputs($helper, $tab),
                    'submit' => array(
                        'title' => !isset($tab) ? $this->l('Add') : $this->l('Save'),
                    )
                )
            )
        );

        $helper->languages = $this->context->controller->getLanguages();
        $helper->default_form_language = (int)$this->context->language->id;
        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL(),
        );

        return $helper->generateForm($fields_form);
    }

    protected function getEditDefaultFormInputs($helper, ANPTTab $tab = null)
    {
        $fields = $this->getEditDefaultFormInputFields();

        $languages = $this->context->controller->getLanguages();
        
        if ($tab !== null) {
            $helper->fields_value[self::COMMON_ID] = $tab->id;

            foreach ($fields as $key => $item) {
                if (isset($item['lang']) && $item['lang']) {
                    if (in_array($key, $this->getDefaultContentFields())) {
                        $_value = array_map(function ($value) {
                            return '';
                        }, array_flip(Language::getLanguages(1, 0, 1)));

                        if ($tab->default_content->count() != 0) {
                            foreach ($tab->default_content as $content) {
                                $value = $content->__get(mb_substr($key, self::DEFAULT_CONTENT_OFFSET));
                            }
                        }

                        if (!is_array($value)) {
                            $value = $_value;
                        }

                        foreach ($value as $lang => $_value) {
                            $helper->fields_value[$key][$lang] = $_value;
                        }
                    } else {
                        foreach ($languages as $lang) {
                            $id_lang = (int)$lang['id_lang'];
                            $helper->fields_value[$key][$id_lang] = $tab->{$key};
                        }
                    }
                } else {
                    if (in_array($key, $this->getDefaultContentFields())) {
                        if ($tab->default_content->count() == 0) {
                            continue;
                        }

                        foreach ($tab->default_content as $content) {
                            $helper->fields_value[$key] = $content->__get(mb_substr($key, self::DEFAULT_CONTENT_OFFSET));
                        }
                    } else {
                        $helper->fields_value[$key] = $tab->{$key};
                    }
                }
            }
        }

        return $fields;
    }

    protected function getEditDefaultFormInputFields()
    {
        return array(
            self::COMMON_ID => array(
                'type' => 'hidden',
                'name' => self::COMMON_ID
            ),
            self::COMMON_NAME => array(
                'col' => 3,
                'type' => 'text',
                'name' => self::COMMON_NAME,
                'label' => $this->l('Tab name'),
                'hint' => $this->l("The name should not be empty"),
                'value' => '',
                'required' => true
            ),
            self::DEFAULT_CONTENT_TITLE => array(
                'col' => 9,
                'type' => 'text',
                'name' => self::DEFAULT_CONTENT_TITLE,
                'label' => $this->l('Tab display name'),
                'lang' => true,
                'value' => ''
            ),
            self::DEFAULT_CONTENT_CONTENT => array(
                'col' => 9,
                'type' => 'textarea',
                'name' => self::DEFAULT_CONTENT_CONTENT,
                'label' => $this->l('Tab default content'),
                'lang' => true,
                'class' => 'autoload_rte',
                'value' => '',
            )
        );
    }

    protected function getEditFormInputs($helper, ANPTTab $tab)
    {
        if ($tab === null || $tab->id <= 0) {
            return array();
        }
            
        $fields = $this->getEditFormInputFields($tab);
        $content_to_parse = $tab->content;

        if ($tab->content->count() == 0) {
            if ($tab->default_content->count() == 0) {
                return $fields;
            }

            $content_to_parse = $tab->default_content;
        }

        $content_active_argument = self::CONTENT_ACTIVE.'_'.$tab->id;
        $content_id_argument = self::CONTENT_ID.'_'.$tab->id;

        if ($tab->content->count() != 0) {
            if ($tab->content->rewind() || $tab->content->valid()) {
                $helper->fields_value[$content_active_argument] = (int)$tab->content->current()->active;
                $helper->fields_value[$content_id_argument] = (int)$tab->content->current()->id;
            }
        }

        $fields_buffer = array($fields[$content_active_argument], $fields[$content_id_argument]);
        unset($fields[$content_active_argument]);
        unset($fields[$content_id_argument]);

        foreach ($fields as $key => $item) {
            if (isset($item['lang']) && $item['lang']) {
                foreach ($content_to_parse as $content) {
                    $value = $content->__get(str_replace('_'.$tab->id, '', mb_substr($key, self::CONTENT_OFFSET)));

                    if (is_array($value)) {
                        foreach ($value as $lang => $_value) {
                            $helper->fields_value[$key][$lang] = $_value;
                        }
                    }
                }
            } else {
                foreach ($content_to_parse as $content) {
                    $helper->fields_value[$key] = $content->__get(str_replace('_'.$tab->id, '', mb_substr($key, self::CONTENT_OFFSET)));
                }
            }
        }

        $fields[$content_active_argument] = $fields_buffer[0];
        $fields[$content_id_argument] = $fields_buffer[1];
        $helper->fields_value['anps_theme_url'] = $this->context->link->getAdminLink(self::AJAX_CONTROLLER_NAME).'&ajax';

        return $fields;
    }

    protected function getEditFormInputFields(ANPTTab $tab)
    {
        return array(
            self::CONTENT_ID.'_'.$tab->id => array(
                'type' => 'hidden',
                'name' => self::CONTENT_ID.'_'.$tab->id,
                'value' => '0',
            ),
            'token' => array(
                'type' => 'hidden',
                'name' => 'anps_theme_url'
            ),
            self::CONTENT_TITLE.'_'.$tab->id => array(
                'col' => 9,
                'type' => 'text',
                'required' => true,
                'name' => self::CONTENT_TITLE.'_'.$tab->id,
                'label' => $this->l('Tab display name'),
                'lang' => true,
                'value' => '',
            ),
            self::CONTENT_ACTIVE.'_'.$tab->id => array(
                'type' => 'switch',
                'label' => $this->l('Active on this product'),
                'name' => self::CONTENT_ACTIVE.'_'.$tab->id,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'active_on',
                        'value' => 1,
                        'label' => $this->l('Yes')
                    ),
                    array(
                        'id' => 'active_off',
                        'value' => 0,
                        'label' => $this->l('No')
                    )
                ),
                'value' => 1
            ),
            self::CONTENT_CONTENT.'_'.$tab->id => array(
                'col' => 9,
                'type' => 'textarea',
                'name' => self::CONTENT_CONTENT.'_'.$tab->id,
                'label' => $this->l('Content'),
                'lang' => true,
                'class' => 'autoload_rte',
                'value' => '',
            )
        );
    }

    protected function getEditFormFields()
    {
        return array_merge(array(self::COMMON_NAME), $this->getDefaultContentFields());
    }

    protected function getDefaultContentFields()
    {
        return array(
            self::DEFAULT_CONTENT_TITLE,
            self::DEFAULT_CONTENT_CONTENT
        );
    }

    protected function getContentFields()
    {
        return array(
            self::CONTENT_TITLE,
            self::CONTENT_CONTENT,
            self::CONTENT_ACTIVE
        );
    }

    protected function postProcess()
    {
        $id = (int)Tools::getValue('id');
        $collection = new ANPTTabCollection();

        $tab = $id > 0 ? $collection->byId($id)->getFirst() : new ANPTTab($id);
        
        $content_collection = new ANPTTabDefaultContentCollection();
        $content = isset($tab->id) && $tab->id > 0 ? $content_collection->byTab($tab->id)->getFirst() : null;
        $content_collection->clear();

        foreach (Language::getLanguages(1, 0, 1) as $language) {
            $default_content = new ANPTTabDefaultContent($content ? $content->id : null, (int)$language);

            foreach ($this->getDefaultContentFields() as $field) {
                $default_content->__set(mb_substr($field, self::DEFAULT_CONTENT_OFFSET), Tools::getValue($field.'_'.$language));
            }

            $content_collection->attach($default_content);
        }

        $tab->default_content = $content_collection;
        $tab->name = Tools::getValue('name', '');

        $this->context->smarty->assign(array(
            ($tab->id > 0 ? 'update_status' : 'insertion_status') => $tab->save()
        ));
    }

    protected function deletionProcess($tab = null)
    {
        if (!($tab instanceof ANPTTab)) {
            return false;
        }

        $this->context->smarty->assign(array(
            'deletion_status' => (bool)$tab->delete()
        ));
    }

    protected function isViewDefault()
    {
        return $this->getParam(self::VIEW_TYPE) == self::VIEW_TYPE_DEFAULT;
    }

    public function hookBackOfficeHeader()
    {
        if (in_array($this->name, array(Tools::getValue('configure', ''), Tools::getValue('module_name', '')))) {
            $this->context->controller->addJquery();
            $this->context->controller->addJS($this->_path.'views/js/tab.js');
            $this->context->controller->addJS($this->_path.'views/js/tab_collection.js');
            $this->context->controller->addJS($this->_path.'views/js/Sortable.min.js');
            $this->context->controller->addJS($this->_path.'views/js/back.js');
        }
    }

    public function hookHeader()
    {
        if (version_compare(_PS_VERSION_, '1.7.0.0', '<')) {
            $this->context->controller->addJS($this->_path.'/views/js/front.js');
            
            if (!$this->isViewDefault()) {
                $this->context->controller->addJS($this->_path.'/views/js/tabs16.js');
            }

            $this->context->controller->addCSS($this->_path.'/views/css/front.css');
        } else {
            $this->context->controller->registerStylesheet("modules-anproductextratabs-fecss", "modules/{$this->name}/views/css/front.css", array('priority' => 150));
            $this->context->controller->registerJavascript("modules-anproductextratabs-fejs", "modules/{$this->name}/views/js/front.js", array('priority' => 200));
        }
    }

    public function hookDisplayFooterProduct($params = null)
    {
        list($id_product, $id_shop) = $this->getProductData($params);

        $content_collection = new ANPTTabContentCollection($this->context->language->id);

        $this->context->smarty->assign(array(
            'id_lang' => $this->context->language->id,
            'languages' => Language::getLanguages(1, 0, 0),
            'tabs' => $content_collection->onlyActive()->byProduct($id_product)->orderByPosition(),
            'display_type' => $this->getParam(self::VIEW_TYPE)
        ));

        return $this->display(__FILE__, $this->views_prefix_hook.($this->isViewDefault() ? 'tab_content.tpl' : 'tab_content_js.tpl'));
    }
    
    public function hookDisplayProductExtraContent($params = null)
    {
        list($id_product, $id_shop) = $this->getProductData($params);
        $content = new ANPTTabContentCollection($this->context->language->id);
        $tabs = array();

        foreach ($content->onlyActive()->byProduct($id_product)->orderByPosition() as $key => $_content) {
            $this->context->smarty->assign(array(
                'id_lang' => $this->context->language->id,
                'languages' => Language::getLanguages(1, 0, 0),
                'tab_content' => $_content
            ));

            $tab = new PrestaShop\PrestaShop\Core\Product\ProductExtraContent();

            $tab->setTitle($_content->title)
                ->setContent($this->display(__FILE__, $this->views_prefix_hook.'tab_content.tpl'));

            $tabs[] = $tab;
        }
        
        return $tabs;
    }

    public function hookDisplayAdminProductsExtra($params = null)
    {
        $this->context->smarty->assign(array(
            $this->name.'_theme_url' => $this->context->link->getAdminLink(self::AJAX_CONTROLLER_NAME)
        ));

        list($id_product, $id_shop) = $this->getProductData($params);

        if (Validate::isLoadedObject(new Product($id_product))) {
            $collection = new ANPTTabCollection();
            $collection->loadContent($id_product, true);

            $this->context->smarty->assign(array(
                // 'forms' => ,
                'id_lang' => $this->context->language->id,
                'id_shop' => $id_shop,
                'id_product' => $id_product,
                'languages' => Language::getLanguages(1, 0, 0),
                'default_language' => Language::getLanguage(Configuration::get('PS_LANG_DEFAULT'))
            ));

            return $this->display(__FILE__, $this->views_prefix_admin.'product_tab_header.tpl')
            .(version_compare(_PS_VERSION_, '1.6.9.9', '>') ? implode('', $this->getNewFormPartial($collection)) : $this->getFormPartial($collection))
            .$this->display(__FILE__, $this->views_prefix_admin.'product_tab_footer.tpl');
        } else {
            return $this->displayError($this->l('You must save this product before managing tabs.'));
        }
    }

    protected function getFormPartial(ANPTTabCollection $tab_collection)
    {
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $languages = $this->context->controller->getLanguages();
        $helper = new HelperForm();

        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite(self::AJAX_CONTROLLER_NAME);
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;

        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->title = $this->displayName;
        $helper->submit_action = 'submit_tabs';

        $fields_form = array();

        foreach ($tab_collection as $tab) {
            $fields_form[] = array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Edit content tab '.$tab->name),
                    ),
                    'input' => $this->getEditFormInputs($helper, $tab),
                    'submit' => array(
                        'title' => $this->l('Save'),
                        'class' => 'btn btn-success pull-right submit_tab_'.$tab->id
                    )
                )
            );
        }

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
        );

        return $helper->generateForm($fields_form);
    }

    protected function getNewFormPartial(ANPTTabCollection $tab_collection)
    {
        $parts = array();
        foreach ($tab_collection as $tab) {
            $fields_value = new StdClass();
            
            $this->context->smarty->assign(array(
                'tab' => $tab,
                'languages' => Language::getLanguages(1, 0, 0),
                'fields' => $this->getEditFormInputs($fields_value, $tab),
                'fields_value' => isset($fields_value->fields_value) ? $fields_value->fields_value : array()
            ));

            $parts[] = $this->display(__FILE__, $this->views_prefix_admin.'form.tpl');
        }

        return $parts;
    }

    protected function getProductData($params = null)
    {
        return array(
            isset($params['id_product']) ? (int)$params['id_product'] : (int)Tools::getValue('id_product'),
            (int)Context::getContext()->shop->id
        );
    }
}
