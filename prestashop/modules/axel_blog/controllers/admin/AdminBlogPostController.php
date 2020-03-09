<?php


class AdminBlogPostController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'blog_post';
        $this->className = 'BlogPost';

        parent::__construct();
        $this->addRowAction('view');
        $this->addRowAction('edit');
        $this->addRowAction('delete');

        $this->fields_list = [
            'id_blog_post' => [
                'title' => $this->trans('id_blog_post', [], 'Admin.Global')
            ],
            'id_blog_category' => [
                'title' => $this->trans('id_blog_category', [], 'Admin.Global')
            ],
            'title' => [
                'title' => $this->trans('Titre', [], 'Admin.Global')
            ],
            'resume' => [
                'title' => $this->trans('Résumé', [], 'Admin.Global')
            ],
            'description' => [
                'title' => $this->trans('Description', [], 'Admin.Global')
            ]
        ];
    }

    public function renderForm()
    {

        $this->fields_form = [
            'input' => [
                [
                    'type' => 'text',
                    'label' => 'Titre',
                    'name' => 'title',
                    'required' => true
                ],
                [
                    'type' => 'select',
                    'label' => 'Catégorie',
                    'options' => array(
                        'query' => Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'blog_category'),
                        'id'    => 'id_blog_category',
                        'name'  => 'title'
                    ),
                    'name' => 'id_blog_category',
                    'required' => true
                ],
                [
                    'type' => 'textarea',
                    'label' => 'Résumé',
                    'name' => 'resume',
                ],
                [
                    'type' => 'textarea',
                    'label' => 'Description',
                    'name' => 'description',
                    'autoload_rte' => true,
                ]
            ],
            'submit' => [
                'title' => $this->trans('Save', [], 'Admin.Action')
            ]
        ];

        return parent::renderForm();
    }
}