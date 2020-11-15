<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string $car_company
 * @property string $model
 * @property int $year
 * @property string $price
 * @property int $engine_power
 * @property int $dors
 * @property int $seats
 * @property string $gearing_type
 * @property string $fuel_type
 * @property string|null $Booking
 * @property string $user
 * @property string $car_photo
 */
class Add_new_car extends \yii\db\ActiveRecord
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
            [['car_company', 'model', 'year', 'price', 'engine_power', 'dors', 'seats', 'gearing_type', 'fuel_type'], 'required'],
            [['year', 'engine_power', 'dors', 'seats'], 'integer'],
            [['car_company', 'price'], 'string', 'max' => 255],
            [['model', 'fuel_type'], 'string', 'max' => 50],
            [['gearing_type'], 'string', 'max' => 100],
            [['Booking'], 'string', 'max' => 15],
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
            'price' => 'Price',
            'engine_power' => 'Engine Power',
            'dors' => 'Dors',
            'seats' => 'Seats',
            'gearing_type' => 'Gearing Type',
            'fuel_type' => 'Fuel Type',
            'Booking' => 'Booking',
        ];
    }
}
