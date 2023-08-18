<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productcart extends Model
{
    use HasFactory;
    protected $guarded = []; 

        //brand relationship
        public function product(){
            return $this->belongsTo(Product::class, 'product_id');
        }//END METHOD

        public function getTotalValue()
        {
            return $this->quantity * $this->product->price;
        }

}
