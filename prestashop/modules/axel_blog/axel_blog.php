<?php

if (!defined('_PS_VERSION_'))
    exit;

require _PS_MODULE_DIR_.'axel_blog\classes\BlogCategory.php';

class axel_blog extends Module
{
    public function __construct()
    {
        $this->name = 'axel_blog';
        $this->version = '1.0.0';
        $this->author = 'axel';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();
        $this->need_instance = true;


        $this->displayName = $this->l('Module axel_blog');
        $this->description = $this->l('create a blog module');
    }

    public function install()
    {

        $bdd = DB::getInstance()->execute('CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'blog_category(
        id_blog_category INT(11) NOT NULL AUTO_INCREMENT,
         title VARCHAR(100) NOT NULL, 
         description TEXT, 
         PRIMARY KEY (id_blog_category)
         )');
        $this->addTab('AdminBlogCategory','Bog category');
        return parent::install()
            && $bdd;

    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function getContent(){


        return '<a href="'.Context::getContext()->link->getAdminLink('AdminBlogCategory').'">AdminBlogCategory</a>';
    }

    public function addTab ($controller, $tabName)
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = $controller;
        $tab->name = array();

        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $tabName;
        }

        $tab->id_parent = -1;
        $tab->module = $this->name;
        $tab->add();
    }
}