<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\campaigns\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'cpm')->textInput() ?>

    <?= $form->field($model, 'cpc')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'repeat')->textInput() ?>

    <?= $form->field($model, 'systraf')->textInput() ?>

    <?= $form->field($model, 'ip_white')->textInput() ?>

    <?= $form->field($model, 'ip_black')->textInput() ?>

    <?= $form->field($model, 'whitelist')->textInput() ?>

    <?= $form->field($model, 'blacklist')->textInput() ?>

    <?= $form->field($model, 'days')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hours')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'only_img')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('campaign', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
