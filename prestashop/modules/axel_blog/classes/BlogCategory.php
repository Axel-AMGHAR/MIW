<?php

Class BlogCategory extends ObjectModel
{
    public $id;
    public $id_blog_category;
    public $title;
    public $description;

    public static $definition = [
        'table' => 'blog_category',
        'primary' => 'id_blog_category',
        'fields' => [
            'title' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
                'size' => 100,
                'required' => true,
            ],
            'description' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
            ]
        ]
    ];
}