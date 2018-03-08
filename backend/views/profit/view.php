<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\profit\Profit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('profit', 'Profits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('profit', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('profit', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('profit', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'sum',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
