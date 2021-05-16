<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarTransmission extends Model
{
    protected $table = 'car_transmission';

    protected $fillable = [
        'name'
    ];

    public function cars() {
        return $this->hasMany('App\Car');
    }
}
