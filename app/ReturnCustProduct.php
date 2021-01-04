<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnCustProduct extends Model
{
    public function payment(){ 
    	return $this->belongsTo(PaymentCustomer::class, 'id', 'invoice_id');
    }

    public function return_cus_details(){
    	return $this->hasMany(ReturnCustProductDetail::class, 'invoice_id', 'id');
    }

    public function product(){
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
