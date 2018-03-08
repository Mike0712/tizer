<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ads\AdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'campaign_id') ?>

    <?= $form->field($model, 'active') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'today_money') ?>

    <?php // echo $form->field($model, 'yestarday_money') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ad', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('ad', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
