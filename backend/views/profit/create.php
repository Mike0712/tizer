<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\profit\Profit */

$this->title = Yii::t('profit', 'Create Profit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('profit', 'Profits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
