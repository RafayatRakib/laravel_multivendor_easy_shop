<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ShipingDistrict;
use App\Models\ShipingDivision;
use App\Models\ShipingUpazila;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ShipingController extends Controller
{
    ////////////////// division part start\\\\\\\\\\\\\\\\\\\\\\\\\\
    public function Alldivision(){
        $division =  ShipingDivision::latest()->get();
        return view('admin.pages.shiping.division_all',compact('division'));
    }//END METHOD

    ////////////////// district part start\\\\\\\\\\\\\\\\\\\\\\\\\\
    public function Alldistrict(){
        return view('admin.pages.shiping.district_all');
    }//END METHOD

    ////////////////// upazila part start\\\\\\\\\\\\\\\\\\\\\\\\\\
    public function Allupazila(){
        return view('admin.pages.shiping.upazila_all');
    }//END METHOD

    ///////////////data get end by ajax \\\\\\\\\\\\\\\

    public function AddDivision(Request $request){

        ShipingDivision::insert([
            'division_name' => $request->division,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // $div = new ShipingDivision();
        // $div->division_name = $request->division;
        // $div->created_at = Carbon::now();
        // $div->updated_at = Carbon::now();
        // $div->save();
        return response()->json(['success' => 'Division added successfuly!']);
    }//END METHOD

    public function AddDistrict(Request $request){
        ShipingDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(['success' => 'District added successfuly!']);
    }//END METHOD

    public function AddUpazila(Request $request){
        $validatedData = $request->validate([
            'option_division' => 'required',
            'district_name' => 'required',
            'upazila_name' => 'required',
          ]);

          if($validatedData){
          $upazila = new ShipingUpazila();
          $upazila->division_id = $request->option_division;
          $upazila->district_id = $request->district_name;
          $upazila->upazila_name = $request->upazila_name;
          $upazila->created_at = Carbon::now();
          $upazila->updated_at = Carbon::now();
          $upazila->save();
            return response()->json(['success' => 'Upazila added successfuly!']);
        }else{
            return response()->json(['error' => 'Somthing is missing']);

        }
    }//END METHOD

    //////////////////get data\\\\\\\\\\\
    public function Getdivisiondata(){
        $division =  ShipingDivision::latest()->get();
        return response()->json(['division' => $division]);

    }//END METHOD

    public function Getdistrictdata(){
        $district =  ShipingDistrict::with('division')->latest()->get();
        $division =  ShipingDivision::all();

        return response()->json(['district' => $district,'division' => $division]);
    }//END METHOD

    public function Getupaziladata(){
        $upazila = ShipingUpazila::with('division','district')->latest()->get();
        return response()->json(['upazila' => $upazila]);
    }//END METHOD

    public function GetdistrictdataByID($id){
        $district = ShipingDistrict::with('division')->where('division_id',$id)->get();
        return response()->json(['district' => $district]);

    }//END METHOD

    /////////////////edit\\\\\\\\\\\\\\\\\\\\

    public function editDivision($id){
        $div =  ShipingDivision::findOrFail($id);
        return response()->json(['division' => $div]);
    }//end method

    public function editDistrict($id){

        $district =  ShipingDistrict::with('division')->findOrFail($id);
        $division =  ShipingDivision::all();

        return response()->json(['district' => $district,'division' => $division]);
        // return response()->json(['district' => $district]);
        
    }//end method


    public function editUpazila($id){
        $upazila =  ShipingUpazila::with('division','district')->findOrFail($id);
        $division =  ShipingDivision::all();
        $district =  ShipingDistrict::all();
        return response()->json(['upazila'=> $upazila,'district' => $district,'division' => $division]);

        
    }//end method


    /////////////////update part\\\\\\\\\\
    public function updateDivision(Request $request ){
        $id = $request->id;
        $div =  ShipingDivision::findOrFail($id);
        $div->division_name = $request->division;
        $div->updated_at = Carbon::now();
        $div->update();
        return response()->json(['success' => 'Division updated successfuly!']);

    }//END METHOD

    public function updateDistrict(Request $request){

        ShipingDistrict::findOrfail($request->id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(['success' => 'District updated successfuly!']);
    }//END METHOD

    public function updateUpazila(Request $request){
        $id = $request->id;
        $upazila =  ShipingUpazila::findOrFail($id);
        $upazila->division_id = $request->division_id;
        $upazila->district_id = $request->district_id;
        $upazila->upazila_name = $request->upazila_name;
        $upazila->updated_at = Carbon::now();
        $upazila->update();

        return response()->json(['success' => 'Upazila updated successfuly!']);
    }//END METHOD


    ///////////////delete \\\\\\\\\\\\
    public function DleteDivision($id){
        ShipingDivision::findOrFail($id)->delete();
        return response()->json(['success' => 'Division deleted successfuly!']);

    }//END METHOD

    public function DleteDistrict($id){
        ShipingDistrict::findOrFail($id)->delete();
        return response()->json(['success' => 'District deleted successfuly!']);
    }//END METHOD

    public function DleteUpazila($id){
        ShipingUpazila::findOrFail($id)->delete();
        return response()->json(['success' => 'Upazila deleted successfuly!']);
    }//END METHOD

}
