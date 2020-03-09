<?php
/* Smarty version 3.1.33, created on 2020-03-09 17:00:09
  from 'module:axelblogviewstemplatesfro' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e666809e64c40_14420859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '941226566fab10b76396a864a084d87c15509c37' => 
    array (
      0 => 'module:axelblogviewstemplatesfro',
      1 => 1583768558,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e666809e64c40_14420859 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!-- begin C:\wamp64_2\www\MIW\prestashop/modules/axel_blog/views/templates/front/posts.tpl -->

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15763225705e666809e56d47_24494461', 'content');
?>


<!-- end C:\wamp64_2\www\MIW\prestashop/modules/axel_blog/views/templates/front/posts.tpl --><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'content'} */
class Block_15763225705e666809e56d47_24494461 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15763225705e666809e56d47_24494461',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <section id="main" class="card card-block">

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
            <div class="row">
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['base_url']->value, ENT_QUOTES, 'UTF-8');?>
module/axel_blog/post?id_blog_post=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['id_blog_post'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['title'], ENT_QUOTES, 'UTF-8');?>
</a>
            </div>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </section>
<?php
}
}
/* {/block 'content'} */
}
