<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\campaigns\Campaign */

$this->title = Yii::t('campaign', 'Update Campaign: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('campaign', 'Campaigns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('campaign', 'Update');
?>
<div class="campaign-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
