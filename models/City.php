<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $id_country
 *
 * @property Country $country
 * @property Place[] $places
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_country'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_country'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['id_country' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_country' => 'Id Country',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'id_country']);
    }

    /**
     * Gets query for [[Places]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlaces()
    {
        return $this->hasMany(Place::className(), ['id_city' => 'id']);
    }

    public function saveCountry($id_country)
    {
        $country = Country::findOne($id_country);
        if($country != null)
        {
            $this->link('country', $country);
            return true;
        }
    }
}
