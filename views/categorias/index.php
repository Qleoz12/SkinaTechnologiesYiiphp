<?php

use app\models\Categorias;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\categoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Categorias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre_categoria',
            [
                'attribute' => 'estadoName',
                'value'=>'estadoName.nombre_estado',
            ],
            'creado',
            'actualizado',
            [
                'attribute' => '_CreadoPor',
                'value'=>'_CreadoPor.nombre_usuario',
            ],
            [
                'attribute' => '_ActualizadoPor',
                'value'=>'_ActualizadoPor.nombre_usuario',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
