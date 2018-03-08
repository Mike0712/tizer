<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\campaigns\CampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('campaign', 'Campaigns');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('campaign', 'Create Campaign'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'name',
            'url:url',
            'price',
            //'active',
            //'status',
            //'cpm',
            //'cpc',
            //'category_id',
            //'type',
            //'repeat',
            //'systraf',
            //'ip_white',
            //'ip_black',
            //'whitelist',
            //'blacklist',
            //'days:ntext',
            //'hours:ntext',
            //'only_img',
            //'created_at',
            //'updated_at',
            //'deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
