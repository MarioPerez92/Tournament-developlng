<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TournamentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tournaments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tournament_id') ?>

    <?= $form->field($model, 'tournament_name') ?>

    <?= $form->field($model, 'tournament_description') ?>

    <?= $form->field($model, 'tournament_status') ?>

    <?= $form->field($model, 'tournament_start_date') ?>

    <?php // echo $form->field($model, 'tournament_end_date') ?>

    <?php // echo $form->field($model, 'tournament_json') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
