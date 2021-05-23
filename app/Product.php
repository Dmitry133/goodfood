<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name','price','new_price','in_stock','barcode','description','imagepath','kCal','protein','fats','carbohydrates','created_at','updated_up','category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
