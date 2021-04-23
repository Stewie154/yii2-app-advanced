<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Authors;
?>

<h1><?= 'Edit Post' ?></h1>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author_id')->dropDownList( ArrayHelper::map(Authors::find()->all(), 'id', 'name'),['prompt'=>'']) ?>

    <?= $form->field($model, 'Title') ?>

    <?= $form->field($model, 'Content')->textarea(['rows' => '10']) ?>

    <?= $form->field($model, 'picture') ?>

    <?= $form->field($model, 'Facebook') ?>

    <?= $form->field($model, 'Twitter') ?>

    <?= $form->field($model, 'Instagram') ?>

    <div class="form-group">
        <?= Html::submitButton('Confirm Changes', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>