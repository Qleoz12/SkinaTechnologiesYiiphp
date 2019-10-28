<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre_producto',
            [
                'attribute' => '_Categoria',
                'value'=>'_Categoria.nombre_categoria',
            ],
            [
                'attribute' => '_Subcategoria',
                'value'=>'_Subcategoria.nombre',
            ],
            'creado:datetime',
            'actualizado:datetime',
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
