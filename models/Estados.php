<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estados".
 *
 * @property int $id
 * @property string $nombre_estado
 *
 * @property Categorias[] $categorias
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_estado'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_estado' => 'Nombre Estado',
        ];
    }


    public function getCategorias()
    {
        return $this->hasMany(Categorias::className(), ['estado' => 'id']);
    }
}
