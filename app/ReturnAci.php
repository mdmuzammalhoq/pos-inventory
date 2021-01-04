<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnAci extends Model
{
    public function paymentaci(){ 
    	return $this->belongsTo(Paymentaci::class, 'id', 'invoice_id');
    }

    public function return_details(){
    	return $this->hasMany(ReturnAciDetail::class, 'invoice_id', 'id');
    }

}
