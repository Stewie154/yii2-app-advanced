<?php
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>ID</label>: <?= Html::encode($model->ID) ?></li>
    <li><label>Author</label>: <?= Html::encode($model->Author) ?></li>
    <li><label>Title</label>: <?= Html::encode($model->Title) ?></li>
    <li><label>Content</label>: <?= Html::encode($model->Content) ?></li>
    <li><label>Picture</label>: <?= Html::encode($model->picture) ?></li>
</ul>