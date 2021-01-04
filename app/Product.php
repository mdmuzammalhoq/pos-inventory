<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function supplier(){
    	return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function category(){
    	return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function unit(){
    	return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    public function purchase(){
    	return $this->belongsTo(Purchase::class, 'id', 'product_id');
    }
}
