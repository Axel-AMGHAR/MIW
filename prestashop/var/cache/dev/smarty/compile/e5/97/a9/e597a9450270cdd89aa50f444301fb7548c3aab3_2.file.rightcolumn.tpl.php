<?php
/* Smarty version 3.1.33, created on 2020-02-24 15:18:25
  from 'C:\wamp64_2\www\MIW\prestashop\modules\likeboxfree\rightcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e53db3130daa5_15380321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e597a9450270cdd89aa50f444301fb7548c3aab3' => 
    array (
      0 => 'C:\\wamp64_2\\www\\MIW\\prestashop\\modules\\likeboxfree\\rightcolumn.tpl',
      1 => 1582552457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e53db3130daa5_15380321 (Smarty_Internal_Template $_smarty_tpl) {
if (Configuration::get('lbf_includeapp') == 1) {?>
    
        <div id="fb-root"></div>
        <?php echo '<script'; ?>
>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        <?php echo '</script'; ?>
>
    
<?php }?>
<div class="fb-page" data-width="<?php echo htmlspecialchars(Configuration::get('lbf_width'), ENT_QUOTES, 'UTF-8');?>
" adapt_container_width="true" data-height="<?php echo htmlspecialchars(Configuration::get('lbf_height'), ENT_QUOTES, 'UTF-8');?>
" data-href="<?php echo htmlspecialchars(Configuration::get('lbf_url'), ENT_QUOTES, 'UTF-8');?>
" data-small-header="<?php if (Configuration::get('lbf_small_header') == 1) {?>true<?php } else { ?>false<?php }?>" data-hide-cta="<?php if (Configuration::get('lbf_hide_cta') == 1) {?>true<?php } else { ?>false<?php }?>" data-hide-cover="<?php if (Configuration::get('lbf_hide_cover') == 1) {?>true<?php } else { ?>false<?php }?>" data-show-facepile="<?php if (Configuration::get('lbf_show_facepile') == 1) {?>true<?php } else { ?>false<?php }?>" data-show-posts="<?php if (Configuration::get('lbf_show_posts') == 1) {?>true<?php } else { ?>false<?php }?>"><div class="fb-xfbml-parse-ignore"></div></div><?php }
}
