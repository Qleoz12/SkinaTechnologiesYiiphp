<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    public function relations()
    {
        return array(
            'user'=>array(self::BELONGS_TO, 'User', 'id'),
            'user'=>array(self::BELONGS_TO, 'User', 'id'),
            'estados'=>array(self::BELONGS_TO, 'Estados', 'id)'),
        );
    }

    public function behaviors()
    {
        return [
            'estado'=>[
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'estado'
                ],
                'value' => function ($event) {return 1;},
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'creado',
                'updatedAtAttribute' => 'actualizado',
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'creado_por',
                'updatedByAttribute' => 'actualizado_por',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_categoria'], 'required'],
            [['nombre_categoria'], 'string', 'max' => 45],
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
}
