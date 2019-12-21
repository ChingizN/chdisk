<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function ticket()
    {
        return $this->belongsTo('App\Ticket', 'department_id');
    }
}
