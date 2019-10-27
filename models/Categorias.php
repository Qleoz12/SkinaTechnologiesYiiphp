<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property int $id
 * @property string $nombre_categoria
 * @property int $estado
 * @property int $creado
 * @property int $actualizado
 * @property int $creado_por
 * @property int $actualizado_por
 *
 * @property Estados $estadoName
 * @property User $_CreadoPor
 * @property User $_ActualizadoPor
 */
class categorias extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_categoria', 'creado', 'actualizado', 'required'],
            [['estado', 'creado', 'actualizado', 'creado_por', 'actualizado_por'], 'integer'],
            [['nombre_categoria'], 'string', 'max' => 45],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['creado_por'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creado_por' => 'id']],
            [['actualizado_por'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['actualizado_por' => 'id']],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_categoria' => 'Nombre Categoria',
            'estado' => 'Estado',
            'creado' => 'Creado',
            'actualizado' => 'Actualizado',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
        ];
    }


    public function getEstadoName()
    {
        return $this->hasOne(Estados::className(), ['id' => 'estado']);
    }

    public function get_CreadoPor()
    {
        return $this->hasOne(User::className(), ['id' => 'creado_por']);
    }

    public function get_ActualizadoPor()
    {
        return $this->hasOne(User::className(), ['id' => 'actualizado_por'])
            ->alias( ' u2');
    }
}
