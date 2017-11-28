<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_alias')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'page_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'page_type')->textInput() ?>
    <?= $form->field($model, 'page_text')->textarea(['rows' => 30]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
