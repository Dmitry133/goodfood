<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Category extends Model
{   use FormAccessible;

        public $primaryKey='id';
        public $table='categories';
        public $fillable=['title','description','imagepath','alias','created_at','updated_at'];


    public function products(){
        return $this->hasMany('App\Product');
    }
}
