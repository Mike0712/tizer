<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\sites\Site */

$this->title = Yii::t('site', 'Update Site: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('site', 'Sites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('site', 'Update');
?>
<div class="site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
