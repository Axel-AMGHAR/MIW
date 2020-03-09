{extends file=$layout}

{block name='content'}

<section id="main" class="card card-block">

    Listes catégories:
    {foreach $categories as $category }
        <div class="row">
            <a href="{$base_url}module/axel_blog/category?id_blog_category={$category.id_blog_category}">{$category.title}</a>
        </div>

    {/foreach}
</section>
{/block}

