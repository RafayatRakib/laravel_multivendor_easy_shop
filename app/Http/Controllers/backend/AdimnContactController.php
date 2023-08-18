<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\OfficeLocation;
use App\Models\Retrurn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
class AdimnContactController extends Controller
{
    public function addContact(){
        return view('admin.pages.contact.add_contact');
    }//end method

    public function storeContact(Request $request){
        
        $request->validate([
            'contact_title' => 'required|max:50',
            'contact_body' => 'required',
        ]);
        
        $contact = new Contact();
        $contact->contact_title = $request->contact_title;
        $contact->contact_des = $request->contact_body;
        if($request->hasFile('contact_image')){
            $file = $request->file('contact_image');
            $new_name = md5(uniqid(rand(),true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(1325,350)->save('public/uploads/contact/'.$new_name);
            $contact_image = 'public/uploads/contact/'.$new_name;
            $contact->contact_image = $contact_image;
        }
        if($request->photo_link){
            $contact->photo_link = $request->photo_link;
        }
        $contact->save();
        $msg = [
            'message' => "Contact added!",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($msg);


    }//end method


    public function adminContact(){
        $allcontact  = Contact::latest()->get();
        return view('admin.pages.contact.all_contact',compact('allcontact'));
    }//end method

    public function contactEdit($id){
        $contact  = Contact::findOrfail($id);
        return view('admin.pages.contact.edit_contact',compact('contact'));
    }//end method

    public function updateContact(Request $request, $id){
        $contact= Contact::findOrFail($id);
        $contact->contact_title = $request->contact_title;
        $contact->contact_des = $request->contact_body;
        if($request->hasFile('contact_image')){
            if($contact->contact_image){
                @unlink($contact->contact_image);
            }
            $file = $request->file('contact_image');
            $new_name = md5(uniqid(rand(),true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(1325,350)->save('public/uploads/contact/'.$new_name);
            $contact_image = 'public/uploads/contact/'.$new_name;
            $contact->contact_image = $contact_image;
        }
        if($request->photo_link){
            $contact->photo_link = $request->photo_link;
        }
        $contact->update();
        $msg = [
            'message' => "Contact updated!",
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.contact.all')->with($msg);
    }//end method


    public function delete($id){
        // dd($id);
        Contact::where('id',$id)->delete();
        $msg = [
            'message' => "Contact Deleted successfuly!",
            'alert-type' => 'danger',
        ];
        return redirect()->route('admin.contact.all')->with($msg);
    }//end method

    public function status($id){
            $change =  Contact::where('status',1)->first();
            $change->status = 0;
            $change->update();
     

        $contact = Contact::where('id',$id)->first();
        $contact->status = ($contact->status == 0) ? 1 : 0;
        $contact->update();

        $msg = [
            'message' => "status updated!",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($msg);
    }//end method


    // office part

    public function AllOffice(){
        $office = OfficeLocation::latest()->get();
        return view('admin.pages.contact.all_office',compact('office'));
    }//end method

    public function addOffice(){
        return view('admin.pages.contact.add_office_address');
    }//end method

    public function StoreOffice(Request $request){
        dd($request);
        $request->validate([
            'office_type' => 'required',
            'office_address' => 'required',
            'map_url' => 'required|url',
        ]);
        OfficeLocation::insert([
            'office_type' => $request->office_type,
            'office_address' => $request->office_address,
            'office_map' => $request->map_url,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $msg = [
            'message' => "Office location added",
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.office.address.all')->with($msg);
    }//end method

    public function OfficeStatus($id){
        $office = OfficeLocation::findOrFail($id);
        if($office->status ==1){
            $office->status = 0;
            $office->update();
            $msg = [
                'message' => 'Offce status successfylly changes!'
            ];
            return redirect()->route('admin.office.address.all')->with($msg);
        }else{
            $office->status = 1;
            $office->update();
            $msg = [
                'message' => 'Offce status successfylly changes!'
            ];
            return redirect()->route('admin.office.address.all')->with($msg);
        }
    }// end method

    public function OfficeEdit($id){
        $office = OfficeLocation::findOrFail($id);
        return view('admin.pages.contact.edit_office',compact('office'));
    }//end method

    public function UpdateOffice(Request $request){
        OfficeLocation::findOrfail($request->office_addres_id)->update([
            'office_type' => $request->office_type,
            'office_address' => $request->office_address,
            'office_map' => $request->map_url,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $msg = [
            'message' => "Office location Update",
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.office.address.all')->with($msg);
    }//end method

    public function OfficeAddressDeleted($id){
        OfficeLocation::where('id',$id)->delete();
        $msg = [
            'message' => "Office address deleted successfuly!",
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.office.address.all')->with($msg);
    }//end method





}
