<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = []; 

    //vendor relationship
    public function vendor(){
        return $this->belongsTo(User::class,'vendor_id','id');
    }//END METHOD

    //category relationship
    public function category(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    
    }//END METHOD

     //subcategory relationship
     public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'sub_cat_id', 'id');
    
    }//END METHOD

    //brand relationship
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }//END METHOD


    //brand relationship
    public function review(){
        return $this->belongsTo(Review::class, 'product_id', 'id');
    }//END METHOD

}
