<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_producto')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'categoria')->dropDownList( \yii\helpers\ArrayHelper::map(\app\models\categorias::find()->all(), 'id', 'nombre_categoria'),['id'=>'nombre_categoria']) ?>
    <?= $form->field($model, 'subcategoria')->widget(DepDrop::classname(), [
    'options'=>['id'=>'nombre'],
    'pluginOptions'=>[
    'depends'=>['nombre_categoria'],
    'placeholder'=>'Select...',
    'loading'=>true,
    'url'=>Url::to(['/categorias/subcategorias'])
    ]
    ]);?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
