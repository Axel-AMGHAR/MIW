<?php
/* Smarty version 3.1.33, created on 2020-02-10 15:27:55
  from 'C:\wamp64_2\www\MIW\prestashop\admin_fjt\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e41686bd5b047_48196192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cb13339fc0aa9fbd5cf923073cfe793dd2412f2' => 
    array (
      0 => 'C:\\wamp64_2\\www\\MIW\\prestashop\\admin_fjt\\themes\\default\\template\\content.tpl',
      1 => 1581340109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e41686bd5b047_48196192 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
