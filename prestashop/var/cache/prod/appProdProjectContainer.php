<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container2wcu0bg\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container2wcu0bg/appProdProjectContainer.php') {
    touch(__DIR__.'/Container2wcu0bg.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\Container2wcu0bg\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \Container2wcu0bg\appProdProjectContainer([
    'container.build_hash' => '2wcu0bg',
    'container.build_id' => 'ba82d2f3',
    'container.build_time' => 1581340792,
], __DIR__.\DIRECTORY_SEPARATOR.'Container2wcu0bg');
