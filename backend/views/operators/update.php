<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\operators\Operator */

$this->title = Yii::t('operator', 'Update Operator: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('operator', 'Operators'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('operator', 'Update');
?>
<div class="operator-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
