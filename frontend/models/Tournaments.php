<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tournaments".
 *
 * @property integer $tournament_id
 * @property string $tournament_name
 * @property string $tournament_description
 * @property string $tournament_status
 * @property string $tournament_start_date
 * @property string $tournament_end_date
 * @property string $tournament_json
 */
class Tournaments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tournaments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournament_name', 'tournament_json','tournament_admin'], 'required'],
            [['tournament_admin'], 'integer'],
            [['tournament_description', 'tournament_status', 'tournament_json'], 'string'],
            [['tournament_start_date', 'tournament_end_date'], 'safe'],
            [['tournament_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tournament_id' => 'Tournament ID',
            'tournament_name' => 'Tournament Name',
            'tournament_admin' => 'Tournament Admin',
            'tournament_description' => 'Tournament Description',
            'tournament_status' => 'Tournament Status',
            'tournament_start_date' => 'Tournament Start Date',
            'tournament_end_date' => 'Tournament End Date',
            'tournament_json' => 'Tournament Json',
        ];
    }
}
