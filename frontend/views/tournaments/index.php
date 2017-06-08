<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TournamentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tournaments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournaments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php  if(!Yii::$app->user->isGuest){ ?>
    <p>
        <?= Html::a('Create Tournaments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'tournament_id',

            [
               'label'=>'name',
               'format' => 'raw',
               'value'=>function ($data) {
                    return Html::a($data['tournament_name'],Url::to(['tournaments/view', 'id' => $data['tournament_id']]));
                },
            ],
            'tournament_description:ntext',
            'tournament_status',
            'tournament_start_date',
            // 'tournament_end_date',
            // 'tournament_json:ntext',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
