<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnAciDetail extends Model
{
    public function category(){
    	return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function product(){
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function returnaci(){
    	return $this->belongsTo(Invoice::class, 'id', 'invoice_id');
    }
}
