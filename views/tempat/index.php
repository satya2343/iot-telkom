<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TempatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tempats';
$this->params['breadcrumbs'][] = $this->title;

//config modal
Modal::begin([
    'id' => 'modal-pop',
    'size' => 'modal-md'
]);
echo '<div class="modalContent"></div>';
Modal::end();

$script = <<< JS
 
$('.btn-modal').on('click', function(e) {
    e.preventDefault();
    $('#modal-pop').modal('show').find('.modalContent').load($(this).attr('href'), function(e) {
        $('#form-tempat').unbind('submit').bind('submit', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax($(this).attr('action'),{
            data : $(this).serialize(),
            type : 'POST',
            success : function(result){
                console.log('success submit');
                $('#modal-pop').modal('hide');
                $.pjax.reload({container : '#pjax-grid'});
                }
            })
        })
    });
})

$('.content').on('click', '.ajax-delete', function(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var status = confirm('apakah anda yakin?');
    if(status == true){
        $.ajax($(this).attr('href'), {
            type : 'POST',
            success : function(result){
                console.log('success delete');
                $.pjax.reload({container : '#pjax-grid'});
            }
        })
    }
})

$('.content').on('click', '.ajax-bulk-delete',function(e){
    var data = $('#grid-tempat').yiiGridView('getSelectedRows');
    
    e.preventDefault();
    e.stopImmediatePropagation();
    $.ajax($(this).attr('href'),{
        type : 'POST',
        dataType : 'json',
        data : {selected : data},
        success : function(result) {
            alert(data);
            console.log(result);
            $.pjax.reload({container : '#pjax-grid'});
        }
    });
})

$('.content').on('click', '.select-on-check-all', function(e) {
    $('input[type=checkbox]').prop('checked', true)
})

JS;

$this->registerJs($script);
?>
<div class="tempat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tempat', ['create'], ['class' => 'btn btn-success btn-modal']) ?>
        <?= Html::a('Delete Selected', ['bulk-delete'], ['class' => 'btn btn-danger ajax-bulk-delete']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id' => 'grid-tempat',
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' =>true,
            'loadingClass' => true,
            'options' => [
                'id' => 'pjax-grid',
                'timeout' => false,
                'enablePushState' => false,
            ]
        ],
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'name' => 'checkbox-tempat',
            ],
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'id_user',
            'nama',
            'waktu_dibuat',
            'waktu_update',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function($url, $model, $key){
                        return Html::a('', ['delete', 'id' => $model->id], ['class' => 'glyphicon glyphicon-trash ajax-delete', 'data-method' => 'POST', 'data-pjax' => 0]);
                    }
                ],
                'options' => [
                    'data-pjax' => 0
                ]
            ],
        ],
    ]); ?>
</div>
