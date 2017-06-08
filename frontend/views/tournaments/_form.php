<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tournaments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tournaments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tournament_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tournament_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tournament_status')->dropDownList([ 'open' => 'Open', 'close' => 'Close', 'started' => 'Started', ], ['prompt' => '']) ?>

    <!--<?= $form->field($model, 'tournament_start_date')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
