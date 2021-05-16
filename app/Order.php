<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'start_date', 'end_date', 'c_fname', 'c_lname', 'c_email', 'c_message', 'car_id', 'status'
    ];

    public function car() {
        return $this->belongsTo('App\Car');
    }
}
