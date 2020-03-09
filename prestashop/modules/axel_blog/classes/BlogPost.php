<?php


class BlogPost extends ObjectModel
{
    public $id;
    public $id_blog_post;
    public $id_blog_category;
    public $title;
    public $resume;
    public $description;

    public static $definition = [
        'table' => 'blog_post',
        'primary' => 'id_blog_post',
        'fields' => [
            'id_blog_category' => [
                'type' => self::TYPE_INT,
                'validate' => 'isInt'
            ],
            'title' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
                'size' => 30,
                'required' => true,
            ],
            'resume' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
                'size' => 100,
            ],
            'description' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
            ]
        ]
    ];
}