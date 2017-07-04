<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MonitoringSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monitoring-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_tempat') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'tegangan') ?>

    <?= $form->field($model, 'arus') ?>

    <?php // echo $form->field($model, 'waktu_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
