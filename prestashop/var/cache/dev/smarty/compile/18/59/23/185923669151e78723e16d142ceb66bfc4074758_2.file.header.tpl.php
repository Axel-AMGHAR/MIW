<?php
/* Smarty version 3.1.33, created on 2020-03-09 16:23:44
  from 'C:\wamp64_2\www\MIW\prestashop\modules\facebookcomments\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e665f80c9f1b4_17405668',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '185923669151e78723e16d142ceb66bfc4074758' => 
    array (
      0 => 'C:\\wamp64_2\\www\\MIW\\prestashop\\modules\\facebookcomments\\header.tpl',
      1 => 1582553789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e665f80c9f1b4_17405668 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('fcbc_appid', $_smarty_tpl->tpl_vars['var']->value['fcbc_appid']);
$_smarty_tpl->_assignInScope('fcbc_admins', $_smarty_tpl->tpl_vars['var']->value['fcbc_admins']);
$_smarty_tpl->_assignInScope('fcbc_lang', $_smarty_tpl->tpl_vars['var']->value['fcbc_lang']);
$_smarty_tpl->_assignInScope('fcbc_appid', $_smarty_tpl->tpl_vars['var']->value['fcbc_appid']);?>
<meta property="fb:app_id" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fcbc_appid']->value, ENT_QUOTES, 'UTF-8');?>
"/>
<?php if (Configuration::get('fcbc_addappid') == 1) {?><meta property="fb:admins" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fcbc_admins']->value, ENT_QUOTES, 'UTF-8');?>
"/><?php }?>
<div id="fb-root"></div>
<?php if (Configuration::get('fcbc_addappid') == 1) {?>
    <?php echo '<script'; ?>
>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fcbc_lang']->value, ENT_QUOTES, 'UTF-8');?>
/all.js#xfbml=1&appId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fcbc_appid']->value, ENT_QUOTES, 'UTF-8');?>
";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));<?php echo '</script'; ?>
>
<?php }
}
}
