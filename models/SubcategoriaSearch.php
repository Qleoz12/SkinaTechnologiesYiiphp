<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subcategoria;

/**
 * SubcategoriaSearch represents the model behind the search form of `app\models\Subcategoria`.
 */
class SubcategoriaSearch extends Subcategoria
{
    public $estadoName;
    public $_CreadoPor;
    public $_ActualizadoPor;
    public $_Categoria;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'estado'], 'integer'],
            [['nombre'], 'safe'],
            [['_Categoria','estadoName','_CreadoPor','_ActualizadoPor'], 'safe'],
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
        $query = Subcategoria::find();
        $query->joinWith(['estadoName','_CreadoPor','_ActualizadoPor','_Categoria']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['_Categoria'] = [
            'asc' => ['categorias.nombre_categoria' => SORT_ASC],
            'desc' => ['categorias.nombre_categoria' => SORT_DESC],
        ];
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
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);
        $query->andFilterWhere(['like', 'estados.nombre_estado', $this->estadoName]);
        $query->andFilterWhere(['like', 'usuarios.nombre_usuario', $this->_CreadoPor]);
        $query->andFilterWhere(['like', ' u2.nombre_usuario', $this->_ActualizadoPor]);
        $query->andFilterWhere(['like', 'categorias.nombre_categoria', $this->_Categoria]);

        return $dataProvider;
    }
}
