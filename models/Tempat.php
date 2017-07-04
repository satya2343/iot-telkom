<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tempat".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $nama
 * @property string $waktu_dibuat
 * @property string $waktu_update
 */
class Tempat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tempat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'nama', 'waktu_dibuat', 'waktu_update'], 'required'],
            [['id_user'], 'integer'],
            [['waktu_dibuat', 'waktu_update'], 'safe'],
            [['nama'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'nama' => 'Nama',
            'waktu_dibuat' => 'Waktu Dibuat',
            'waktu_update' => 'Waktu Update',
        ];
    }
}
