<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Authors;
?>

<h1><?= 'Create New Post' ?></h1>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author_id')->dropDownList( ArrayHelper::map(Authors::find()->all(), 'ID', 'name'),['prompt'=>'']) ?>

    <?= $form->field($model, 'Title') ?>

    <?= $form->field($model, 'Content')->textArea(['rows' => '10']) ?>

    <?= $form->field($model, 'picture') ?>

    <?= $form->field($model, 'Facebook') ?>

    <?= $form->field($model, 'Twitter') ?>

    <?= $form->field($model, 'Instagram') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>