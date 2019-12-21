<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['author', 'department_id', 'theme', 'description'];

    public function department()
    {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }
}
