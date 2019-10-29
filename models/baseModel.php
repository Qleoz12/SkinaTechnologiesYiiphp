<?php


namespace app\models;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
* @property int $estado
* @property int $creado
* @property int $actualizado
* @property int $creado_por
* @property int $actualizado_por
*
* @property Estados $estadoName
* @property User $_CreadoPor
* @property User $_ActualizadoPor
* */
class baseModel extends \yii\db\ActiveRecord
{

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
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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