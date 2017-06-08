<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lan_tournaments".
 *
 * @property integer $id
 * @property integer $tid
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 *
 * @property LanBrackets $t
 */
class LanTournaments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lan_tournaments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tid', 'name'], 'required'],
            [['tid'], 'integer'],
            [['description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['tid'], 'exist', 'skipOnError' => true, 'targetClass' => LanBrackets::className(), 'targetAttribute' => ['tid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tid' => 'Tid',
            'name' => 'Name',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getT()
    {
        return $this->hasOne(LanBrackets::className(), ['id' => 'tid']);
    }
}
