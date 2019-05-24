<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'name' ,
        'email' ,
        'logo'
    ];
    
    public function companies()
    {
        return $this->belongsTo('App\Companies');
    }
}
