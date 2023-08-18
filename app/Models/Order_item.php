<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $guarded = [];

    //order 
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }

    //product
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
        // return $this->belongsTo(Product::class, 'product_id');
    }

    //user
    public function user(){
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
    



    
}
