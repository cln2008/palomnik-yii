<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.08.2017
 * Time: 13:30
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* echo "<pre>";
 print_r($gallery);
 echo "</pre>";*/

?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($gallery, 'gallery_name')->textInput(['maxlength' => true])->label('Название галереи') ?>
    <?= $form->field($gallery, 'gallery_title')->textInput(['maxlength' => true])->label('Заголовок галереи') ?>
    <?= $form->field($gallery, 'gallery_path')->textInput()->label('Сохранять') ?>
<!--    --><?//= $form->field($gallery, 'imageFile')->fileInput() ?>
    <?= $form->field($gallery, 'imageFile')->widget(FileInput::classname(),
        [
           'options' => ['accept' => 'image/*'],
            'language' => 'ru',
           'pluginOptions' => [
               'showPreview' => true,
               'showRemove' => false,
               'showUpload' => true,
               'browseClass' => 'btn btn-danger btn-sm',

           ],
        ])
    ?>

<!--
    // Usage with ActiveForm and model
    echo $form->field($model, 'avatar')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*'],]);
-->


    <div class="form-group">
        <?= Html::submitButton($gallery->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $gallery->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<br><br>
<?= FileInput::widget(
    [
        'model' => $gallery,
        'attribute' => 'gallery_preview',
        'options' => ['accept' => 'image/*'],
        'language' => 'ru',
        'pluginOptions' => [
            'showPreview' => true,
            'showRemove' => false,
            'showUpload' => true,
            'browseClass' => 'btn btn-danger btn-sm',

        ],
    ])
?>



