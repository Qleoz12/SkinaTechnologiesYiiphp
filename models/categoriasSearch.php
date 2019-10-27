<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * categoriasSearch represents the model behind the search form of `app\models\categorias`.
 */
class categoriasSearch extends categorias
{
    public $estadoName;
    public $_CreadoPor;
    public $_ActualizadoPor;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'creado', 'actualizado', 'creado_por', 'actualizado_por'], 'integer'],
            [['nombre_categoria','estado','estadoName','_CreadoPor','_ActualizadoPor'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = categorias::find();
        $query->joinWith(['estadoName','_CreadoPor','_ActualizadoPor']);
            // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //join order
        $dataProvider->sort->attributes['estadoName'] = [
            'asc' => ['estados.nombre_estado' => SORT_ASC],
            'desc' => ['estados.nombre_estado' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['_CreadoPor'] = [
            'asc' => ['usuarios.nombre_usuario' => SORT_ASC],
            'desc' => ['usuarios.nombre_usuario' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['_ActualizadoPor'] = [
            'asc' => ['usuarios.nombre_usuario' => SORT_ASC],
            'desc' => ['usuarios.nombre_usuario' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $this->load($params);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'creado' => $this->creado,
            'actualizado' => $this->actualizado,
        ]);

        $query->andFilterWhere(['like', 'estados.nombre_estado', $this->estadoName]);
        $query->andFilterWhere(['like', 'nombre_categoria', $this->nombre_categoria]);
        $query->andFilterWhere(['like', 'usuarios.nombre_usuario', $this->_CreadoPor]);
        $query->andFilterWhere(['like', ' u2.nombre_usuario', $this->_ActualizadoPor]);


        return $dataProvider;
    }
}
