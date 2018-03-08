<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\campaigns\Campaign */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('campaign', 'Campaigns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('campaign', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('campaign', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('campaign', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'name',
            'url:url',
            'price',
            'active',
            'status',
            'cpm',
            'cpc',
            'category_id',
            'type',
            'repeat',
            'systraf',
            'ip_white',
            'ip_black',
            'whitelist',
            'blacklist',
            'days:ntext',
            'hours:ntext',
            'only_img',
            'created_at',
            'updated_at',
            'deleted',
        ],
    ]) ?>

</div>
