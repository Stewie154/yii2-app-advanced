<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>All Posts</h1>
<div class="posts-container">
    <?php foreach ($posts as $post): ?>
        <a class="post-card" href="/posts/view/<?=$post->id?>">
            <div class="post-body">
                <h3><?=$post->Title?></h3>
                <img src=<?=$post->picture?> alt="author">
                <h4>By: <?=$post->author->name?></h4>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>