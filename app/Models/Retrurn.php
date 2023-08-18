<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retrurn extends Model
{
    use HasFactory;
    protected $guarded = [];

        //product
        public function product(){
            return $this->belongsTo(Product::class, 'product_id', 'id');
            // return $this->belongsTo(Product::class, 'product_id');
        }
    
        //vendor
        public function vendor(){
            return $this->belongsTo(User::class, 'vendor_id', 'id');
        }

        //user
        public function user(){
            return $this->belongsTo(User::class, 'user_id', 'id');
        }
        
        //order
        public function order(){
            return $this->belongsTo(Order::class, 'order_id', 'id');
        }
        
        
}
