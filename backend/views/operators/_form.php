<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\operators\Operator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_min')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_max')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_short')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('operator', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
