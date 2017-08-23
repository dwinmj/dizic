<?php /* Smarty version Smarty-3.1.19, created on 2017-08-23 17:09:32
         compiled from "C:\wamp64\www\dizic\modules\welcome\views\templates\tooltip.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29191599d464c1879c8-25991487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad97a1b446b152d45093ce26c67fd69b2ff23c70' => 
    array (
      0 => 'C:\\wamp64\\www\\dizic\\modules\\welcome\\views\\templates\\tooltip.tpl',
      1 => 1500455840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29191599d464c1879c8-25991487',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_599d464c1a2f43_86022812',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599d464c1a2f43_86022812')) {function content_599d464c1a2f43_86022812($_smarty_tpl) {?>

<div class="onboarding-tooltip">
  <div class="content"></div>
  <div class="onboarding-tooltipsteps">
    <div class="total"><?php echo smartyTranslate(array('s'=>'Step','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
 <span class="count">1/5</span></div>
    <div class="bulls">
    </div>
  </div>
  <button class="btn btn-primary btn-xs onboarding-button-next"><?php echo smartyTranslate(array('s'=>'Next','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</button>
</div>
<?php }} ?>
