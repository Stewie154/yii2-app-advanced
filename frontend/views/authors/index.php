<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Meet the Authors</h1>

<div class="posts-container">
    <?php foreach ($authors as $author): ?>
        <a class="post-card" href="/authors/view/<?=$author->id?>">
            <div class="post-body">
                <h3><?=$author->name?></h3>
                <img src=<?=$author->picture?> alt="author">
                <h4>"<?=$author->fact?>"</h4>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>



