<?php
/* Smarty version 3.1.33, created on 2020-03-09 17:00:07
  from 'module:axelblogviewstemplatesfro' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e666807f1fcf7_18381602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fd6aaf8ffcbdd3c898579132aa5395c081fd158' => 
    array (
      0 => 'module:axelblogviewstemplatesfro',
      1 => 1583769606,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e666807f1fcf7_18381602 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!-- begin C:\wamp64_2\www\MIW\prestashop/modules/axel_blog/views/templates/front/category.tpl -->

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20416524245e666807f0c1f9_73931503', 'content');
?>


<!-- end C:\wamp64_2\www\MIW\prestashop/modules/axel_blog/views/templates/front/category.tpl --><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'content'} */
class Block_20416524245e666807f0c1f9_73931503 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20416524245e666807f0c1f9_73931503',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<section id="main" class="card card-block">

    Listes catégories:
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
        <div class="row">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['base_url']->value, ENT_QUOTES, 'UTF-8');?>
module/axel_blog/category?id_blog_category=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['id_blog_category'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['title'], ENT_QUOTES, 'UTF-8');?>
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
