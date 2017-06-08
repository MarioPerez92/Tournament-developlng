<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lan_brackets".
 *
 * @property integer $id
 * @property integer $tid
 * @property string $json
 *
 * @property LanTournaments[] $lanTournaments
 */
class LanBrackets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lan_brackets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tid', 'json'], 'required'],
            [['tid'], 'integer'],
            [['json'], 'string'],
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
            'json' => 'Json',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanTournaments()
    {
        return $this->hasMany(LanTournaments::className(), ['tid' => 'id']);
    }
}
