<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id
 * @property string $nombre_producto
 * @property int $estado
 * @property int $creado
 * @property int $actualizado
 * @property int $creado_por
 * @property int $actualizado_por
 * @property int $categoria
 * @property int $subcategoria
 *
 * @property categorias $_Categoria
 * @property Subcategoria $_Subcategoria
 *
 */
class Producto extends baseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_producto', 'categoria', 'subcategoria'], 'required'],
            [['estado', 'creado', 'actualizado', 'creado_por', 'actualizado_por', 'categoria', 'subcategoria'], 'integer'],
            [['nombre_producto'], 'string', 'max' => 45],
            [['nombre_producto'], 'unique'],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['creado_por'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creado_por' => 'id']],
            [['actualizado_por'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['actualizado_por' => 'id']],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => categorias::className(), 'targetAttribute' => ['categoria' => 'id']],
            [['subcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategoria::className(), 'targetAttribute' => ['subcategoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_producto' => 'Nombre Producto',
            'estado' => 'Estado',
            'creado' => 'Creado',
            'actualizado' => 'Actualizado',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
            'categoria' => 'Categoria',
            'subcategoria' => 'Subcategoria',
        ];
    }

    public function get_Categoria()
    {
        return $this->hasOne(categorias::className(), ['id' => 'categoria']);
    }

    public function get_Subcategoria()
    {
        return $this->hasOne(Subcategoria::className(), ['id' => 'subcategoria']);
    }

}
