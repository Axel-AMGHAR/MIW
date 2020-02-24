<?php
/* Smarty version 3.1.33, created on 2020-02-24 15:18:25
  from 'C:\wamp64_2\www\MIW\prestashop\modules\socialnetworklinks\views\front\column.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e53db319419f4_96912932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '504e7cc133bf0d544bbeb184c2f4152f126e821b' => 
    array (
      0 => 'C:\\wamp64_2\\www\\MIW\\prestashop\\modules\\socialnetworklinks\\views\\front\\column.tpl',
      1 => 1582550147,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e53db319419f4_96912932 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul id="social" class="isocial">
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_facebook == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_facebook_url, ENT_QUOTES, 'UTF-8');?>
" class="facebook" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_twitter == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_twitter_url, ENT_QUOTES, 'UTF-8');?>
" class="twitter" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_youtube == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_youtube_url, ENT_QUOTES, 'UTF-8');?>
" class="youtube" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_google == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_google_url, ENT_QUOTES, 'UTF-8');?>
" class="google" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_linkedin == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_linkedin_url, ENT_QUOTES, 'UTF-8');?>
" class="linkedin" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_instagram == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_instagram_url, ENT_QUOTES, 'UTF-8');?>
" class="instagram" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_flickr == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_flickr_url, ENT_QUOTES, 'UTF-8');?>
" class="flickr" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_vkontakte == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_vkontakte_url, ENT_QUOTES, 'UTF-8');?>
" class="vkontakte" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_odnru == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_odnru_url, ENT_QUOTES, 'UTF-8');?>
" class="odnru" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_nk == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_nk_url, ENT_QUOTES, 'UTF-8');?>
" class="nk" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_pinterest == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_pinterest_url, ENT_QUOTES, 'UTF-8');?>
" class="pinterest" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_myspace == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_myspace_url, ENT_QUOTES, 'UTF-8');?>
" class="myspace" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_lastfm == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_lastfm_url, ENT_QUOTES, 'UTF-8');?>
" class="lastfm" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_yelp == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_yelp_url, ENT_QUOTES, 'UTF-8');?>
" class="yelp" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_picsart == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_picsart_url, ENT_QUOTES, 'UTF-8');?>
" class="picsart" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_tumblr == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_tumblr_url, ENT_QUOTES, 'UTF-8');?>
" class="tumblr" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_digg == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_digg_url, ENT_QUOTES, 'UTF-8');?>
" class="digg" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_wordpress == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_wordpress_url, ENT_QUOTES, 'UTF-8');?>
" class="wordpress" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_deviantart == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_deviantart_url, ENT_QUOTES, 'UTF-8');?>
" class="deviantart" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_weibo == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_weibo_url, ENT_QUOTES, 'UTF-8');?>
" class="weibo" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_qzone == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_qzone_url, ENT_QUOTES, 'UTF-8');?>
" class="qzone" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_formspring == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_formspring_url, ENT_QUOTES, 'UTF-8');?>
" class="formspring" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_ask == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_ask_url, ENT_QUOTES, 'UTF-8');?>
" class="ask" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_blogger == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_blogger_url, ENT_QUOTES, 'UTF-8');?>
" class="blogger" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_ljournal == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_ljournal_url, ENT_QUOTES, 'UTF-8');?>
" class="ljournal" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_orkut == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_orkut_url, ENT_QUOTES, 'UTF-8');?>
" class="orkut" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_googlep == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_googlep_url, ENT_QUOTES, 'UTF-8');?>
" class="googlep" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_apple == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_apple_url, ENT_QUOTES, 'UTF-8');?>
" class="apple" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_adobe == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_adobe_url, ENT_QUOTES, 'UTF-8');?>
" class="adobe" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_vimeo == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_vimeo_url, ENT_QUOTES, 'UTF-8');?>
" class="vimeo" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_rss == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_rss_url, ENT_QUOTES, 'UTF-8');?>
" class="rss" target="blank"></a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['snlvar']->value->snl_spotify == 1) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['snlvar']->value->snl_spotify_url, ENT_QUOTES, 'UTF-8');?>
" class="spotify" target="blank"></a></li><?php }?>
    </ul><?php }
}
