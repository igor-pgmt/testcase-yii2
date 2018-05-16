<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "rates".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $pair
 * @property mixed $addingtime
 * @property mixed $ask
 * @property mixed $bid
 * @property mixed $last
 * @property mixed $high
 * @property mixed $low
 * @property mixed $open
 * @property mixed $averages
 * @property mixed $volume
 * @property mixed $changes
 * @property mixed $volumepercent
 * @property mixed $timestamp
 * @property mixed $displaytimestamp
 */
class Rates extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['steam', 'rates'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'pair',
            'addingtime',
            'ask',
            'bid',
            'last',
            'high',
            'low',
            'open',
            'averages',
            'volume',
            'changes',
            'volumepercent',
            'timestamp',
            'displaytimestamp',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pair', 'addingtime', 'ask', 'bid', 'last', 'high', 'low', 'open', 'averages', 'volume', 'changes', 'volumepercent', 'timestamp', 'displaytimestamp'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'pair' => 'Pair',
            'addingtime' => 'Addingtime',
            'ask' => 'Ask',
            'bid' => 'Bid',
            'last' => 'Last',
            'high' => 'High',
            'low' => 'Low',
            'open' => 'Open',
            'averages' => 'Averages',
            'volume' => 'Volume',
            'changes' => 'Changes',
            'volumepercent' => 'Volumepercent',
            'timestamp' => 'Timestamp',
            'displaytimestamp' => 'Displaytimestamp',
        ];
    }
}
