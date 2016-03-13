<div class="row">
    <div class="col-md-8">
        <?php foreach ($posts as $post) : ?>
            <div class="well">
                <h2><?= $post->title ?></h2>
                <div><?= $post->intro ?></div>
                <?= $this->Html->link('Read More',
                    [
                        'controller' => 'posts',
                        'action' => 'view',
                        $post->slug
                    ],
                    [
                        'class' => 'btn btn-primary'
                    ]
                ) ?>
            </div>
        <?php endforeach ?>
    </div>
    <div class="col-md-4">
        <h3>Recent Posts</h3>
        <h3>Tags</h3>
        <h3>Archives</h3>
    </div>
</div>
