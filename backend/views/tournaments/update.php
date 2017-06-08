<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tournaments */

$this->title = 'Update Tournaments: ' . $model->tournament_id;
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tournament_id, 'url' => ['view', 'id' => $model->tournament_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tournaments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
