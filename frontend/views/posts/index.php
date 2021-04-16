<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>All Posts</h1>
<div class="posts-container">
    <?php foreach ($posts as $post): ?>
            <div class="post-card">
                <a href="https://www.google.co.uk/">
                    <h3><?=$post->Title?></h3>
                </a>
                <img src=<?=$post->picture?> alt="author">
                <h4>By: <?=$post->Author?></h4>
            </div>
    <?php endforeach; ?>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>