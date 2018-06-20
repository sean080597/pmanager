<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'days',
        'hours',
        'project_id',
        'company_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
