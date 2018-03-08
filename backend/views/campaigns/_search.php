<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\campaigns\CampaignSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'cpm') ?>

    <?php // echo $form->field($model, 'cpc') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'repeat') ?>

    <?php // echo $form->field($model, 'systraf') ?>

    <?php // echo $form->field($model, 'ip_white') ?>

    <?php // echo $form->field($model, 'ip_black') ?>

    <?php // echo $form->field($model, 'whitelist') ?>

    <?php // echo $form->field($model, 'blacklist') ?>

    <?php // echo $form->field($model, 'days') ?>

    <?php // echo $form->field($model, 'hours') ?>

    <?php // echo $form->field($model, 'only_img') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('campaign', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('campaign', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
