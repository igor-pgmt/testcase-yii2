<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "products".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $appid
 * @property mixed $name
 * @property mixed $addingtime
 */
class Products extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['steam', 'products'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'appid',
            'name',
            'addingtime',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[['_id'], 'appid', 'name', 'addingtime'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'appid' => 'Appid',
            'name' => 'Name',
            'addingtime' => 'Addingtime',
        ];
    }

	public function getRates()
	{
		return $this->hasOne(Rates::className(), ['id' => 'rate_id']);
	}

	public function getRateName() // получаем кошельки по их id
	{
		$rate = $this->rates;
		return $rate ? $rate->pair : '';
    }
    
}
