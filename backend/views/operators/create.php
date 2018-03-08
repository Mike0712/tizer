<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\operators\Operator */

$this->title = Yii::t('operator', 'Create Operator');
$this->params['breadcrumbs'][] = ['label' => Yii::t('operator', 'Operators'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
