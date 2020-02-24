<?php
/* Smarty version 3.1.33, created on 2020-02-24 17:02:24
  from 'C:\wamp64_2\www\MIW\prestashop\modules\social_axel\views\templates\hook\social_axel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e53f3901e45d1_09496085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2dcdd236fcdae91c2a1a147b2af7ce2092387338' => 
    array (
      0 => 'C:\\wamp64_2\\www\\MIW\\prestashop\\modules\\social_axel\\views\\templates\\hook\\social_axel.tpl',
      1 => 1582560142,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e53f3901e45d1_09496085 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Block social_axel -->
<div id="ns_monmodule_block_home" class="block">
    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Partager sur :','d'=>'Modules.Ns_MonModule'),$_smarty_tpl ) );?>
</h4>
    <div class="block_content">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ns_page_link']->value, ENT_QUOTES, 'UTF-8');?>
">Facebook</a>
    </div>
    <div class="block_content">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['twitter_link']->value, ENT_QUOTES, 'UTF-8');?>
">Twitter</a>
    </div>
</div>
<!-- /Block social_axel --><?php }
}
