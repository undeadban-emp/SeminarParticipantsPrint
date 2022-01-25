<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'code', 'province_code', 'name', 'income_classification', 'population', 'status'
    ];

    protected $primaryKey = 'code';

    public function barangays(){
        return $this->hasOne(Barangay::class, 'city_code', 'code');
    }
}
