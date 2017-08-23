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

    </div>
    <div class="panel-footer">
        <a href="javascript:location.reload();" class="btn btn-default"><i class="process-icon-cancel"></i> Cancel</a>
        <button type="submit" name="submitAddproduct" class="btn btn-default pull-right"><i class="process-icon-save"></i> Save</button>
        <button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i> Save and stay</button>
    </div>
</div>

<script type='text/javascript'>
    jQuery('#configuration_form').validate();
    var anpt_controller_url = decodeURIComponent('{$anproductextratabs_theme_url|escape:'url':'UTF-8'}&ajax');
    var anpt_messages = JSON.parse("{$anproductextratabs_msg|escape:'javascript':'UTF-8'}");
    
    jQuery(document).ready(function () {
        jQuery("[name='submit_tabs']").on('click', function () {
            var id_anproducttabs = jQuery(this).attr('class').substr((new String('btn btn-success pull-right submit_tab_')).length);
            var id = parseInt(jQuery('input[name="content_id_'+id_anproducttabs+'"]').val()) || 0;
            var lang_id = parseInt(jQuery(this).attr('data-language')) || 0;

            var title = {};
            var content = {};
            
            {foreach from=$languages item=lang}
            (function (_title, _content) {
                title[{$lang.id_lang|intval}] = _title;
                content[{$lang.id_lang|intval}] = _content;
            })(jQuery('#content_title_'+id_anproducttabs+'_'+{$lang.id_lang|intval}).val().trim(), tinyMCE.get('content_content_'+id_anproducttabs+'_'+{$lang.id_lang|intval}).getContent(JSON.parse("{$anpt_tinymce_format|escape:'javascript':'UTF-8'}")));
            {/foreach}

            jQuery.post(anpt_controller_url, {
                action: 'updateContent',
                id: id,
                id_anproducttabs: id_anproducttabs,
                id_product: {$id_product|intval},
                id_shop: {$id_shop|intval},
                title: title,
                content: content,
                active: parseInt(jQuery("[name='content_active_"+id_anproducttabs+"']:checked").val()) || 0
            }).then(function (response) {
                if (response.content_id > 0) {
                    showSuccessMessage(anpt_messages.update.success);
                    jQuery('input[name="content_id_'+id_anproducttabs+'"]').attr('value', response.content_id);
                } else {
                    showErrorMessage(anpt_messages.update.error);
                }
            });

            return false;
        });
    });
</script>