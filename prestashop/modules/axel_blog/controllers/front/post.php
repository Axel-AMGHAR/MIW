<?php

class Axel_BlogPostModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $id_blog_category = Tools::getValue('id_blog_category');
        if ($id_blog_category) {
            $this->context->smarty->assign([
                'base_url' => $this->context->shop->getBaseURL(),
                'posts' => Db::getInstance()
                    ->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'blog_post WHERE id_blog_category = ' . (int)$id_blog_category)
            ]);
            $this->setTemplate('module:axel_blog/views/templates/front/posts.tpl');
        } else {
            $this->context->smarty->assign([
                'base_url' => $this->context->shop->getBaseURL(),
                'categories' => Db::getInstance()
                    ->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'blog_category')
            ]);
            $this->setTemplate('module:axel_blog/views/templates/front/category.tpl');

        }
    }
}