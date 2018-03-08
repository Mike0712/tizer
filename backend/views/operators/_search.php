<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\operators\OperatorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'ip_min') ?>

    <?= $form->field($model, 'ip_max') ?>

    <?= $form->field($model, 'country_short') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('operator', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('operator', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
