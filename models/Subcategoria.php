<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "subcategorias".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property categorias $_Categoria
 */
class Subcategoria extends baseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcategorias';
    }


    public function rules()
    {
        return [
            [[ 'estado', 'creado', 'actualizado', 'creado_por', 'actualizado_por'], 'required'],
            [['id', 'estado', 'creado', 'actualizado', 'creado_por', 'actualizado_por'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => categorias::className(), 'targetAttribute' => ['categoria' => 'id']],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['creado_por'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creado_por' => 'id']],
            [['actualizado_por'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['actualizado_por' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nombre' => 'Nombre',
            'categoria' => 'categoria',
        ];
    }

    public function get_Categoria()
    {
        return $this->hasOne(categorias::className(), ['id' => 'categoria']);
    }


}
