<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipingDistrict extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function division(){
        return $this->belongsTo(ShipingDivision::class, 'division_id');
    }
}
