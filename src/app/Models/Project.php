<?php

namespace App\Models;

use App\Models\Freelancer;
use App\Models\DetailProject;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = [
        'nama_project',
        'deskripsi_project',
        'tanggal_mulai',
        'tanggal_akhir',
        'dibuat_oleh'
    ];
    public function pembuat(){
        return $this->hasMany(Freelancer::class);
    }

    public function detail_project(){
        return $this->hasMany(DetailProject::class);
    }

}
