<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCustomer extends Model
{
    public function customer(){
    	return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function product(){
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    } 

    public function returnaci(){
    	return $this->belongsTo(ReturnAci::class, 'invoice_id', 'id');
    }
}
