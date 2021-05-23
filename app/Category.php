<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

//        public $primaryKey='id';
//        public $table='categories';
//        public $fillable=['title','description','imagepath','alias','created_at','updated_at'];


    public function products(){
        return $this->hasMany('App\Product');
    }
}
