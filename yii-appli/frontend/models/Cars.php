<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string $car_company
 * @property string $model
 * @property int $year
 * @property int $price
 */
class Cars extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_company', 'model', 'year'], 'required'],
            [['year'], 'integer'],
            [['car_company'], 'string', 'max' => 255],
            [['model'], 'string', 'max' => 50],
            [["price"],"integer"]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_company' => 'Car Company',
            'model' => 'Model',
            'year' => 'Year',
            "price"=>"Price"
        ];
    }
}
