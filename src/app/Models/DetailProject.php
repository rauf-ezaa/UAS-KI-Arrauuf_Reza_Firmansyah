<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Model;

class DetailProject extends Model
{
    protected $table = 'detail_project';
    protected $fillable = [
        'project_id',
        'freelancer_id',
        'progress_note',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function frelancer(){
        return $this->belongsTo(Freelancer::class);
    }
}
