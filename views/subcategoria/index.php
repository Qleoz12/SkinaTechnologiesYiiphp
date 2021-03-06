<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubcategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subcategorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Subcategoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            [
                'attribute' => 'estadoName',
                'value'=>'estadoName.nombre_estado',
            ],
            [
                'attribute' => '_Categoria',
                'value'=>'_Categoria.nombre_categoria',
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
