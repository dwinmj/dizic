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

class AdminAnProductTabsController extends ModuleAdminController
{
    public function ajaxProcessTest()
    {
        return $this->setJsonResponse(array('success' => true));
    }
    
    public function ajaxProcessGet()
    {
        $collection = new ANPTTabCollection();
        $this->setJsonResponse($collection->rewind()->toArray());
    }

    public function ajaxProcessUpdateContent()
    {
        $content = $this->getContentFromPost();
        $response = true;
        $id_content = null;

        ANPTTransaction::start();

        if ($id_content !== null && $content->id <= 0) {
            $content->id = $id_content;
        }

        if ($content->save() === false) {
            $response = false;
            ANPTTransaction::rollback();
        }

        $id_content = $content->id;

        ANPTTransaction::commit();

        $this->setJsonResponse(array(
            'success' => $response,
            'content_id' => $id_content
        ));
    }

    public function ajaxProcessUpdateOrder()
    {
        $collection = new ANPTTabCollection();
        $tab_order = (array)Tools::getValue('order');

        foreach ($collection->byId(array_keys($tab_order)) as $tab) {
            $tab->setPosition($tab_order[$tab->id]);
        }

        return $this->setJsonResponse(array(
            'success' => $collection->update()
        ));
    }

    protected function setJsonResponse($data)
    {
        header("Content-Type: application/json; charset=utf8");
        die(Tools::jsonEncode($data));
    }

    protected function getContentFromPost()
    {
        $content = (new ANPTTabContent(Tools::getValue('id', 0)));
        $content->setIdAnproducttabs(Tools::getValue('id_anproducttabs', null))
            ->setIdProduct(Tools::getValue('id_product', null))
            ->setTitle((array)Tools::getValue('title', array()))
            ->setContent((array)Tools::getValue('content', array()))
            ->setActive((bool)Tools::getValue('active', false));

        return $content;
    }
}
