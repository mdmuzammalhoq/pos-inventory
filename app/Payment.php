<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     public function customer(){
    	return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function product(){
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    } 

    public function invoice(){
    	return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
}
