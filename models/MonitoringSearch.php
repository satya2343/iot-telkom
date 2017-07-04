<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Monitoring;

/**
 * MonitoringSearch represents the model behind the search form about `app\models\Monitoring`.
 */
class MonitoringSearch extends Monitoring
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tempat', 'status'], 'integer'],
            [['tegangan', 'arus'], 'number'],
            [['waktu_update'], 'safe'],
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
        $query = Monitoring::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_tempat' => $this->id_tempat,
            'status' => $this->status,
            'tegangan' => $this->tegangan,
            'arus' => $this->arus,
            'waktu_update' => $this->waktu_update,
        ]);

        return $dataProvider;
    }
}
