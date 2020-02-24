<?php
/* Smarty version 3.1.33, created on 2020-02-24 15:18:27
  from 'module:facebookcommentstabconten' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e53db33c61ae6_40971209',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9e91f216d723e46e15aa72ea86b0cf70e0ade15' => 
    array (
      0 => 'module:facebookcommentstabconten',
      1 => 1582553789,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e53db33c61ae6_40971209 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin C:\wamp64_2\www\MIW\prestashop/modules/facebookcomments/tabcontents.tpl -->
<?php $_smarty_tpl->_assignInScope('fcbc_width', $_smarty_tpl->tpl_vars['var']->value['fcbc_width']);
$_smarty_tpl->_assignInScope('fcbc_nbp', $_smarty_tpl->tpl_vars['var']->value['fcbc_nbp']);
$_smarty_tpl->_assignInScope('fcbc_scheme', $_smarty_tpl->tpl_vars['var']->value['fcbc_scheme']);?>

    <style>
        .fb_ltr, .fb_iframe_widget, .fb_iframe_widget span {
            width: 100% !important
        }
    </style>


<div id="fcbc" class="">
    <div data-href="http://<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value['product_page_url'], ENT_QUOTES, 'UTF-8');?>
" class="fb-comments" data-width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fcbc_width']->value, ENT_QUOTES, 'UTF-8');?>
" data-numposts="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fcbc_nbp']->value, ENT_QUOTES, 'UTF-8');?>
" data-colorscheme="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fcbc_scheme']->value, ENT_QUOTES, 'UTF-8');?>
"></div>
</div>
<!-- end C:\wamp64_2\www\MIW\prestashop/modules/facebookcomments/tabcontents.tpl --><?php }
}
