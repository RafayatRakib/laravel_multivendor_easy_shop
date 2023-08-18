<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    
    public function cacheClear(){
        Artisan::call('optimize:clear');
        request()->session()->flash('success', 'Cache cleared Successfully .');
        return redirect()->back();
    }//
}
