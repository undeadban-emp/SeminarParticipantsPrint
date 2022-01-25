<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'suffix', 'age', 'city', 'barangay', 'contact_number', 'visitor', 'about_me',
    ];
    public function barangays(){
        return $this->hasOne(Barangay::class, 'code', 'barangay');
    }
    public function cities(){
        return $this->hasOne(City::class, 'code', 'city');
    }
}
