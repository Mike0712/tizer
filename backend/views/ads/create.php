<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ads\Ad */

$this->title = Yii::t('ad', 'Create Ad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ad', 'Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
