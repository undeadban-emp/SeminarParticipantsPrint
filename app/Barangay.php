<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $fillable = [
        'province_code', 'city_code', 'code', 'name', 'type', 'population', 'status'
    ];

    protected $primaryKey = 'province_code';

    public function cities(){
        return $this->belongsTo(City::class, 'code', 'city_code ');
    }

}
