<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $fillable = [
        'name', 'price'
    ];

    public function user(){
    	return $this->hasOne('App\User');
    }
}
