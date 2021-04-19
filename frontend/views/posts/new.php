<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1><?= 'Create New Post' ?></h1>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Author') ?>

    <?= $form->field($model, 'Title') ?>

    <?= $form->field($model, 'Content') ?>

    <?= $form->field($model, 'picture') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>