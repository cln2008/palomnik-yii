<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход в систему';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <pre> -->
        <? /* Yii::$app->getSecurity()->generatePasswordHash('user')*/ ?>
    <!-- </pre> -->

    <p>Для входа в систему заполните, пожалуйста, следующие поля:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->label('Пользователь')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->label('Пароль')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->label('Запомнить меня')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
