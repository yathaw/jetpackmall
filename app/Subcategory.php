<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subcategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'category_id'
    ];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }





}
