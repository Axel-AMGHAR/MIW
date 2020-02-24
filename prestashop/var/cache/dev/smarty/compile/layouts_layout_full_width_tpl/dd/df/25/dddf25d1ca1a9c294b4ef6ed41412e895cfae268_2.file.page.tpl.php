<?php
/* Smarty version 3.1.33, created on 2020-02-24 15:18:25
  from 'C:\wamp64_2\www\MIW\prestashop\themes\classic\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e53db31354b43_15876761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dddf25d1ca1a9c294b4ef6ed41412e895cfae268' => 
    array (
      0 => 'C:\\wamp64_2\\www\\MIW\\prestashop\\themes\\classic\\templates\\page.tpl',
      1 => 1581340093,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e53db31354b43_15876761 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2048675435e53db3133fa28_11301256', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_10950099155e53db313428b2_56460670 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_2691507085e53db31340e96_65010421 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10950099155e53db313428b2_56460670', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_10867136565e53db3134b956_54266905 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_8049211395e53db3134d878_43574395 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_1547570535e53db3134a4a0_67197566 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10867136565e53db3134b956_54266905', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8049211395e53db3134d878_43574395', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_9231264465e53db31351959_11889714 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_17017859105e53db31350546_88204175 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9231264465e53db31351959_11889714', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_2048675435e53db3133fa28_11301256 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2048675435e53db3133fa28_11301256',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_2691507085e53db31340e96_65010421',
  ),
  'page_title' => 
  array (
    0 => 'Block_10950099155e53db313428b2_56460670',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_1547570535e53db3134a4a0_67197566',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_10867136565e53db3134b956_54266905',
  ),
  'page_content' => 
  array (
    0 => 'Block_8049211395e53db3134d878_43574395',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_17017859105e53db31350546_88204175',
  ),
  'page_footer' => 
  array (
    0 => 'Block_9231264465e53db31351959_11889714',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2691507085e53db31340e96_65010421', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1547570535e53db3134a4a0_67197566', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17017859105e53db31350546_88204175', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
