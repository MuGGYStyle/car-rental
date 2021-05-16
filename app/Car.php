<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'name', 'fuel', 'seat', 'uild_on', 'price_per_day', 'is_active', 'photo_url', 'car_trans_id'
    ];

    public function transmission() {
        return $this->belongsTo('App\CarTransmission', 'car_trans_id', 'id');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }
}
