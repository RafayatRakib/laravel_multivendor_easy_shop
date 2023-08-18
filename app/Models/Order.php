<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    //user 
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //division
    public function division(){
        return $this->belongsTo(ShipingDivision::class, 'division_id', 'id');
    }

    //district
    public function district(){
        return $this->belongsTo(ShipingDistrict::class, 'district_id', 'id');
    }

    //upazila 
    public function upazila(){
        return $this->belongsTo(ShipingUpazila::class, 'district_id', 'id');
    }

    
}
