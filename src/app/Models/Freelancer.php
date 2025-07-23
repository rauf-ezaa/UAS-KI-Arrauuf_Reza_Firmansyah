<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Support\Str;
use App\Models\DetailProject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Freelancer extends Model
{
    use HasFactory;

    protected static function boot(){
        parent::boot();

        static::creating(function ($freelancer){
            if(empty($freelancer->api_token)){
                $freelancer->api_token = Str::random(13);
            }
        });
    }

    protected $table = 'freelancer';
    protected $fillable = [
        'nama_frelancer',
        'nomor_telpon',
        'tanggal_masuk',
        'user_id',
        'status',
        'api_token'
    ];


    public function user(){
        return $this->hasOne(User::class);
    }

    public function project(){
        return $this->hasMany(Project::class,'dibuat_oleh');
    }

    public function detailProject(){
        return $this->hasMany(DetailProject::class);
    }

}
