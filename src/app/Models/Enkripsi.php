<?php

namespace App\Models;

use App\Encryption\EncryptionHelper;
use Illuminate\Database\Eloquent\Model;

class Enkripsi extends Model
{
    protected $table = 'enkripsi_data';
    protected $fillable = [
        'enkripsi_data',
        'kunci_enkripsi',
        'dekripsi_data',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dekripsi_data = EncryptionHelper::decrypt($model->enkripsi_data);
        });
    }
}
