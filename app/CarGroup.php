<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarGroup extends Model
{
    protected $table = 'car_group';

    protected $fillable = ['name', 'photo_url', 'category_id', 'price_per_day'];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
