<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Monitoring */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monitoring-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tempat')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'tegangan')->textInput() ?>

    <?= $form->field($model, 'arus')->textInput() ?>

    <?= $form->field($model, 'waktu_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
