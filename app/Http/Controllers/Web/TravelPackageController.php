<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarDistrict;
use App\Model\City;
use App\Model\HotelAmenity;
use App\Model\Owner;
use App\Model\PropertyType;
use App\Model\TourSpot;
use App\Model\TravelPackage;

class TravelPackageController extends Controller
{
    /**
     * show hotel packages
     */
    public function index(){
        $travel_packages = TravelPackage::orderBy('id','DESC')->get();
        return view('quicar.backend.travel_package.index', compact('travel_packages'));
    }

    /**
     * show hotel packages create page
     */
    public function create(){
        $districts = CarDistrict::all();
        $owners    = Owner::all();
        $amenities = HotelAmenity::where('status', 1)->get();
        return view('quicar.backend.travel_package.create', compact('districts','owners','amenities'));
    }

    /**
     * travel packages store
     */
    public function store(Request $request){ 
        $this->validate($request,[
            'tour_name' => 'required',
            'organizer_name' => 'required',
            'organizer_phone' => 'required',
            'district_id' => 'required',
            'spot_ids' => 'required',
            'starting_location' => 'required',
            'starting_address' => 'required',
            'day_night' => 'required',
            'total_person' => 'required',
            'added_person' => 'required',
            'cost_per_person' => 'required',
            'owner_get_per_person' => 'required',
            'quicar_charge' => 'required',
            'referrel_code' => 'required',
            'travel_starting_date' => 'required',
            'travel_starting_date_timestamp' => 'required',
            'details' => 'required',
            'facilities' => 'required',
            'term_and_condition' => 'required',            
            'owner_id' => 'required',
            'status' => 'required',
            'status_message' => 'required',
            'travel_package_rating' => 'required'
        ]); 
        $travel_package                      = new TravelPackage();
        $travel_package->tour_name           = $request->tour_name;
        $travel_package->organizer_name      = $request->organizer_name;
        $travel_package->organizer_phone     = $request->organizer_phone;
        $travel_package->district_id         = $request->district_id;
        $travel_package->district_name       = CarDistrict::find($request->district_id)->value;
        $travel_package->spot_ids            = json_encode($request->spot_ids);
        $travel_package->starting_location   = $request->starting_location;
        $travel_package->starting_address    = $request->starting_address;
        $travel_package->day_night           = $request->day_night;
        $travel_package->total_person        = $request->total_person;
        $travel_package->added_person        = $request->added_person;
        $travel_package->cost_per_person     = $request->cost_per_person;
        $travel_package->owner_get_per_person= $request->owner_get_per_person;
        $travel_package->quicar_charge       = $request->quicar_charge;
        $travel_package->referrel_code       = $request->referrel_code;
        $travel_package->travel_starting_date= $request->travel_starting_date;
        $travel_package->travel_starting_date_timestamp        = $request->travel_starting_date_timestamp;
        $travel_package->details             = $request->details;
        $travel_package->details             = $request->details;
        $travel_package->facilities          = json_encode($request->facilities); 
        $travel_package->term_and_condition  = $request->term_and_condition;
        $travel_package->owner_id            = $request->owner_id;
        $travel_package->status              = $request->status;
        $travel_package->status_message      = $request->status_message;
        $travel_package->travel_package_rating= $request->travel_package_rating;
        if($travel_package->save()){
            return redirect()->route('backend.travel.package.index')->with('message','Travel package added successfully');
        }else{
            return redirect()->back()->with('error_message','Sorry, something went wrong');
        }
    }

    /**
     * show city by district_id
     */
    public function getCity($district_id){ 
        $cities= City::select('id','name')->where('district_id',$district_id)->get();
        return response()->json($cities);
    }

    /**
     *  get hotel charge by owner id
     */
    public function getCharge($owner_id){ 
        $travel_package_charge= Owner::find($owner_id)->hotel_package_charge;         
        return response()->json($travel_package_charge);
    }

    
    /**
     * show hotel packages edit page
     */
    public function edit($id){
        $travel_package= TravelPackage::find($id);
        $spots = TourSpot::where('district_id', $travel_package->district_id)->get();
        $districts  = CarDistrict::all();
        $owners     = Owner::all();
        $amenities = HotelAmenity::where('status', 1)->get();
        return view('quicar.backend.travel_package.edit', compact('travel_package','spots','districts','owners', 'amenities'));
    }
    
    /**
     * travel packages store
     */
    public function update(Request $request, $id){ 
        $this->validate($request,[
            'tour_name' => 'required',
            'organizer_name' => 'required',
            'organizer_phone' => 'required',
            'district_id' => 'required',
            'spot_ids' => 'required',
            'starting_location' => 'required',
            'starting_address' => 'required',
            'day_night' => 'required',
            'total_person' => 'required',
            'added_person' => 'required',
            'cost_per_person' => 'required',
            'owner_get_per_person' => 'required',
            'quicar_charge' => 'required',
            'referrel_code' => 'required',
            'travel_starting_date' => 'required',
            'travel_starting_date_timestamp' => 'required',
            'details' => 'required',
            'facilities' => 'required',
            'term_and_condition' => 'required',            
            'owner_id' => 'required',
            'status' => 'required',
            'status_message' => 'required',
            'travel_package_rating' => 'required'
        ]);
        $travel_package                     = TravelPackage::find($id);
        $travel_package->tour_name           = $request->tour_name;
        $travel_package->organizer_name      = $request->organizer_name;
        $travel_package->organizer_phone     = $request->organizer_phone;
        $travel_package->district_id         = $request->district_id;
        $travel_package->district_name       = CarDistrict::find($request->district_id)->value;
        $travel_package->spot_ids            = json_encode($request->spot_ids);
        $travel_package->starting_location   = $request->starting_location;
        $travel_package->starting_address    = $request->starting_address;
        $travel_package->day_night           = $request->day_night;
        $travel_package->total_person        = $request->total_person;
        $travel_package->added_person        = $request->added_person;
        $travel_package->cost_per_person     = $request->cost_per_person;
        $travel_package->owner_get_per_person= $request->owner_get_per_person;
        $travel_package->quicar_charge       = $request->quicar_charge;
        $travel_package->referrel_code       = $request->referrel_code;
        $travel_package->travel_starting_date= $request->travel_starting_date;
        $travel_package->travel_starting_date_timestamp        = $request->travel_starting_date_timestamp;
        $travel_package->details             = $request->details;
        $travel_package->details             = $request->details;
        $travel_package->facilities          = json_encode($request->facilities); 
        $travel_package->term_and_condition  = $request->term_and_condition;
        $travel_package->owner_id            = $request->owner_id;
        $travel_package->status              = $request->status;
        $travel_package->status_message      = $request->status_message;
        $travel_package->travel_package_rating= $request->travel_package_rating;        
        if($travel_package->update()){
            return redirect()->route('backend.travel.package.index')->with('message','Travel package updated successfully');
        }else{
            return redirect()->back()->with('error_message','Sorry, something went wrong');
        }
    }

    /**
     * delete hotel package
     */
    public function destroy($id){
        TravelPackage::find($id)->delete();
        return redirect()->route('backend.travel.package.index')->with('message','Travel package deleted successfully');
    }
}
