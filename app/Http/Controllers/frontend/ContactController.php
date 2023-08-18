<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\OfficeLocation;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        $contact =  Contact::where('status',1)->first();
        $address =  OfficeLocation::where('status',1)->get();
        return view('frontend.pages.contact.contact',compact('contact','address'));
    }//end method




}
