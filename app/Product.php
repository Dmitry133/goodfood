<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Product extends Model
{   use FormAccessible;

    public $table = 'products';
    public $primaryKey = 'id';
    public $fillable = ['name','price','new_price','in_stock','barcode','description','imagepath','kCal','protein','fats','carbohydrates','created_at','updated_up','category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
