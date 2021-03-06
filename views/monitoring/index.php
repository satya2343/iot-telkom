<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MonitoringSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monitorings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitoring-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Monitoring', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_tempat',
            'status',
            'tegangan',
            'arus',
            'waktu_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
