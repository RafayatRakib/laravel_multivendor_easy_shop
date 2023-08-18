<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Return_image extends Model
{
    use HasFactory;
    protected $guarded = [];
    //return
    public function return(){
        return $this->belongsTo(Retrurn::class, 'return_id','id');
    }

    //order
    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    //product
    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
