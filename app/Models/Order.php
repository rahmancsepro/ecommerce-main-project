<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
     protected $guarded = [];

    public function division(){
        return $this->belongsTo('App\Models\Division','division_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }

    public function state(){
        return $this->belongsTo('App\Models\State','state_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function orderItems(){
        return $this->hasMany('App\Models\OrderItem','order_id');
    }

}
