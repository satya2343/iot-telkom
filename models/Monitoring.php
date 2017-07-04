<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monitoring".
 *
 * @property integer $id
 * @property integer $id_tempat
 * @property integer $status
 * @property double $tegangan
 * @property double $arus
 * @property string $waktu_update
 */
class Monitoring extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tempat', 'status', 'tegangan', 'arus', 'waktu_update'], 'required'],
            [['id_tempat', 'status'], 'integer'],
            [['tegangan', 'arus'], 'number'],
            [['waktu_update'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tempat' => 'Id Tempat',
            'status' => 'Status',
            'tegangan' => 'Tegangan',
            'arus' => 'Arus',
            'waktu_update' => 'Waktu Update',
        ];
    }
}
