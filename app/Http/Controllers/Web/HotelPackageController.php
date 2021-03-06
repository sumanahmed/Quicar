<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarDistrict;
use App\Model\HotelPackage;
use App\Model\City;
use App\Model\HotelAmenity;
use App\Model\Owner;
use App\Model\PropertyType;

class HotelPackageController extends Controller
{
    /**
     * show hotel packages
     */
    public function index(){
        $hotel_packages = HotelPackage::join('district','district.id','hotel_packages.district_id')
                                        ->join('city','city.id','hotel_packages.city_id')
                                        ->select('district.value as district_name','city.name as city_name',
                                        'hotel_packages.id','hotel_packages.price','hotel_packages.min_price','hotel_packages.hotel_name',
                                        'hotel_packages.max_price','hotel_packages.status')
                                        ->get();
        return view('quicar.backend.hotel_package.index', compact('hotel_packages'));
    }

    /**
     * show hotel packages create page
     */
    public function create(){
        $districts = CarDistrict::all();
        $owners    = Owner::all();
        $property_types = PropertyType::where('status', 1)->get();
        $amenities = HotelAmenity::where('status', 1)->get();
        return view('quicar.backend.hotel_package.create', compact('districts','owners','property_types','amenities'));
    }

    /**
     * hotel packages store
     */
    public function store(Request $request){
        $this->validate($request,[
            'hotel_name' => 'required',
            'status_message' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'area' => 'required',
            'room_type' => 'required',
            'room_size' => 'required',
            'propertyType' => 'required',
            'facilities' => 'required',
            'price' => 'required',
            'quicar_charge' => 'required',
            'you_will_get' => 'required',
            'owner_id' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            'booking_policy' => 'required',
            'cancellation_policy' => 'required',
            'booking_contact_number' => 'required',
            'referrel_code' => 'required',
            'hotel_website' => 'required',
            'facebook_page' => 'required',
            'hotel_image' => 'required',
            'room_image' => 'required',
        ]); 
        $hotel_package                     = new HotelPackage();
        $hotel_package->hotel_name         = $request->hotel_name;
        $hotel_package->status             = $request->status;
        $hotel_package->status_message     = $request->status_message;
        $hotel_package->district_id        = $request->district_id;
        $hotel_package->city_id            = $request->city_id;
        $hotel_package->area               = $request->area;
        $hotel_package->room_type          = $request->room_type;
        $hotel_package->room_size          = $request->room_size;
        $hotel_package->propertyType       = $request->propertyType;
        $hotel_package->facilities         = json_encode($request->facilities); 
        $hotel_package->owner_id           = $request->owner_id;
        $hotel_package->price              = $request->price;
        $hotel_package->quicar_charge      = $request->quicar_charge;
        $hotel_package->you_will_get       = $request->you_will_get;
        $hotel_package->min_price          = $request->min_price;
        $hotel_package->max_price          = $request->max_price;        
        $hotel_package->booking_policy     = $request->booking_policy;
        $hotel_package->cancellation_policy= $request->cancellation_policy;
        $hotel_package->booking_contact_number= $request->booking_contact_number;
        $hotel_package->referrel_code      = $request->referrel_code;
        $hotel_package->hotel_website      = $request->hotel_website;
        $hotel_package->facebook_page      = $request->facebook_page;
        if($request->hasFile('hotel_image')){
            $image      = $request->file('hotel_image');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/hotel_packge/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $hotel_package->hotel_image = $imageUrl;
        }
        if($request->hasFile('room_image')){
            $image2     = $request->file('room_image');
            $image2Name = time().".".$image2->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/hotel_packge/';
            $image2->move($directory, $image2Name);
            $image2Url  = $directory.$image2Name;
            $hotel_package->room_image = $image2Url;
        }
        if($hotel_package->save()){
            return redirect()->route('backend.hotel.package.index')->with('message','hotel package added successfully');
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
        $hotel_package_charge= Owner::find($owner_id)->hotel_package_charge;         
        return response()->json($hotel_package_charge);
    }

    
    /**
     * show hotel packages edit page
     */
    public function edit($id){
        $hotel_package= HotelPackage::find($id);
        $districts  = CarDistrict::all();
        $cities     = City::where('district_id', $hotel_package->district_id)->get();
        $owners     = Owner::all();
        $property_types = PropertyType::where('status', 1)->get();
        $amenities = HotelAmenity::where('status', 1)->get();
        return view('quicar.backend.hotel_package.edit', compact('hotel_package','districts','cities','owners','property_types','amenities'));
    }
    
    /**
     * hotel packages store
     */
    public function update(Request $request, $id){
        $this->validate($request,[
            'hotel_name' => 'required',
            'status_message' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'area' => 'required',
            'room_type' => 'required',
            'room_size' => 'required',
            'propertyType' => 'required',
            'facilities' => 'required',
            'price' => 'required',
            'quicar_charge' => 'required',
            'you_will_get' => 'required',
            'owner_id' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            'booking_policy' => 'required',
            'cancellation_policy' => 'required',
            'booking_contact_number' => 'required',
            'referrel_code' => 'required',
            'hotel_website' => 'required',
            'facebook_page' => 'required',
        ]);
        $hotel_package                     = HotelPackage::find($id);
        $hotel_package->hotel_name         = $request->hotel_name;
        $hotel_package->status             = $request->status;
        $hotel_package->status_message     = $request->status_message;
        $hotel_package->district_id        = $request->district_id;
        $hotel_package->city_id            = $request->city_id;
        $hotel_package->area               = $request->area;
        $hotel_package->room_type          = $request->room_type;
        $hotel_package->room_size          = $request->room_size;
        $hotel_package->propertyType       = $request->propertyType;
        $hotel_package->facilities         = json_encode($request->facilities); 
        $hotel_package->owner_id           = $request->owner_id;
        $hotel_package->price              = $request->price;
        $hotel_package->quicar_charge      = $request->quicar_charge;
        $hotel_package->you_will_get       = $request->you_will_get;
        $hotel_package->min_price          = $request->min_price;
        $hotel_package->max_price          = $request->max_price;        
        $hotel_package->booking_policy     = $request->booking_policy;
        $hotel_package->cancellation_policy= $request->cancellation_policy;
        $hotel_package->booking_contact_number= $request->booking_contact_number;
        $hotel_package->referrel_code      = $request->referrel_code;
        $hotel_package->hotel_website      = $request->hotel_website;
        $hotel_package->facebook_page      = $request->facebook_page;
        if($request->hasFile('hotel_image')){
            if(($hotel_package->hotel_image != null) && file_exists($hotel_package->hotel_image)){
                unlink($hotel_package->hotel_image);
            }
            $image      = $request->file('hotel_image');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/hotel_packge/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName; dd($imageUrl);
            $hotel_package->hotel_image = $imageUrl;
        }
        if($request->hasFile('room_image')){
            if(($hotel_package->room_image != null) && file_exists($hotel_package->room_image)){
                unlink($hotel_package->room_image);
            }
            $image2     = $request->file('room_image');
            $image2Name = time().".".$image2->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/hotel_packge/';
            $image2->move($directory, $image2Name);
            $image2Url  = $directory.$image2Name;
            $hotel_package->room_image = $image2Url;
        }
        if($hotel_package->update()){
            return redirect()->route('backend.hotel.package.index')->with('message','Hotel package updated successfully');
        }else{
            return redirect()->back()->with('error_message','Sorry, something went wrong');
        }
    }

    /**
     * delete hotel package
     */
    public function destroy($id){
        $hotel_package = HotelPackage::find($id)->delete();
        return redirect()->route('backend.hotel.package.index')->with('message','Hotel package deleted successfully');
    }
}
