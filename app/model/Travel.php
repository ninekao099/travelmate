<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travel';

    function categoryItem(){
    						//Class Name  , id ใน Category , category ใน travel
    	return $this->hasOne('App\model\Category' , 'id' , 'category');
    }

    function images(){
    						//Class Name  , travel ใน image , id ใน travel
    	return $this->hasMany('App\model\Image' , 'travel' , 'id');
    }
}	
