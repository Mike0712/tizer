<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\campaigns\Campaign */

$this->title = Yii::t('campaign', 'Create Campaign');
$this->params['breadcrumbs'][] = ['label' => Yii::t('campaign', 'Campaigns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
