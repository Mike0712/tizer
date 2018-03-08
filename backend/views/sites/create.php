<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\sites\Site */

$this->title = Yii::t('site', 'Create Site');
$this->params['breadcrumbs'][] = ['label' => Yii::t('site', 'Sites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
