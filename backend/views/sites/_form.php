<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\sites\Site */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'statistic_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'statistic_pass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirm_status')->textInput() ?>

    <?= $form->field($model, 'ban_msg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('site', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
