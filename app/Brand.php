<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brand extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'logo'
    ];

    public function items(){
        return $this->hasMany('App\Item');
    }
}
