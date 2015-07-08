<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property string $id
 * @property string $name
 * @property string $sex
 * @property string $birthday
 * @property string $country_code
 * @property string $create_time
 * @property string $update_time
 *
 * @property Country $countryCode
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex'], 'string'],
            [['birthday', 'create_time', 'update_time'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['country_code'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'sex' => Yii::t('app', 'Sex'),
            'birthday' => Yii::t('app', 'Birthday'),
            'country_code' => Yii::t('app', 'Country Code'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryCode()
    {
        return $this->hasOne(Country::className(), ['code' => 'country_code']);
    }
}
