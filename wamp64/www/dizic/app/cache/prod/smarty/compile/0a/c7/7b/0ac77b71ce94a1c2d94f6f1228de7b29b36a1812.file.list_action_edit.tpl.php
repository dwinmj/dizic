<?php /* Smarty version Smarty-3.1.19, created on 2017-08-23 17:32:50
         compiled from "C:\wamp64\www\dizic\admin149wnode7\themes\default\template\helpers\list\list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18855599d4bc2519920-00367517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ac77b71ce94a1c2d94f6f1228de7b29b36a1812' => 
    array (
      0 => 'C:\\wamp64\\www\\dizic\\admin149wnode7\\themes\\default\\template\\helpers\\list\\list_action_edit.tpl',
      1 => 1500455710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18855599d4bc2519920-00367517',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_599d4bc2603f51_44663189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599d4bc2603f51_44663189')) {function content_599d4bc2603f51_44663189($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['href']->value,'html','UTF-8');?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>

</a>
<?php }} ?>
