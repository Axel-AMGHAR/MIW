{extends file=$layout}

{block name='content'}

    <section id="main" class="card card-block">

        {foreach $posts as $post }
            <div class="row">
                <a href="{$base_url}module/axel_blog/post?id_blog_post={$post.id_blog_post}">{$post.title}</a>
            </div>

        {/foreach}
    </section>
{/block}

