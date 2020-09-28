<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string $car_company
 * @property string $model
 * @property int $year
 */
class Cars extends \yii\db\ActiveRecord
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
        ];
    }
}
