<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipingUpazila extends Model
{
    use HasFactory;
    protected $guarded = []; 

    // division
    public function division(){
        return $this->belongsTo(ShipingDivision::class, 'division_id');
    }//end method

    //district
    public function district(){
        return $this->belongsTo(ShipingDistrict::class, 'district_id');
    }//end method

    



}
