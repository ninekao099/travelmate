<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    function travels(){
    						//Class Name  , id ใน travel , category
    	return $this->hasMany('App\model\Travel' , 'category' , id);
    }
}
