<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificateImage extends Model
{
    protected $fillable = ["file_path", "status"];
}
