<?php

namespace wartron\yii2eventlog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
* Gizmo represents the model behind the search form about `common\models\Gizmo`.
*/
class EventSearch extends EventlogItem
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'type', 'user_id', 'read_at', 'created_at'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
    * @inheritdoc
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


        $query = EventlogItem::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        //$this->created_by = Yii::$app->user->id;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'user_id' => $this->user_id,
            'read_at' => $this->read_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}