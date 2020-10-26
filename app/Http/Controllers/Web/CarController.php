<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Car;
use App\Model\CarYear;
use App\Model\CarModel;
use App\Model\CarBrand;
use App\Model\CarClass;
use App\Model\CarColor;
use App\Model\CarDistrict;
use Illuminate\Http\Request;
use Validator;

class CarController extends Controller
{
    //show all cars
    public function index(){
        $cars = Car::leftjoin('owners','owners.api_token','cars.owner_id')
                    ->leftjoin('drivers','drivers.id','cars.driver_id')
                    ->select('cars.id','cars.name','cars.img1','cars.c_status','owners.name as owner_name',
                            'owners.phone as owner_phone','drivers.name as driver_name','drivers.phone as driver_phone',
                            'drivers.c_status as driver_current_status','drivers.license','drivers.nid','drivers.account_status'
                            )
                    ->get();
        return view('quicar.backend.car.index', compact('cars'));
    }

    //show edit page
    public function edit($id){
        $car        = Car::find($id);
        $years      = CarYear::all();
        $models     = CarModel::all();
        $brands     = CarBrand::all();
        $classes    = CarClass::all();
        $colors     = CarColor::all();
        $districts  = CarDistrict::all();
        return view('quicar.backend.car.edit', compact('car','years','models','brands','classes','colors','districts'));
    }

    //car update
    public function update(Request $request, $id){
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $car                    = Car::find($id);
            $car->name              = $request->name;
            $car->registration_no   = $request->registration_no;
            $car->year              = $request->year;
            $car->model             = $request->model;
            $car->brand             = $request->brand;
            $car->car_class         = $request->car_class;
            $car->color             = $request->color;
            $car->capacity          = $request->capacity;
            $car->tax               = $request->tax;
            $car->fitness           = $request->fitness;
            if($request->hasFile('img1')){
                if(($car->img1 != null) && file_exists($car->img1)){
                    unlink($car->img1);
                }
                $image1             = $request->file('img1');
                $image1Name         = "img1".time().".".$image1->getClientOriginalExtension();
                $directory          = '../mobileapi/asset/car/';
                $image1->move($directory, $image1Name);
                $image1Url          = $directory.$image1Name;
                $car->img1      = $image1Url;
            }
            if($request->hasFile('img2')){
                if(($car->img2 != null) && file_exists($car->img2)){
                    unlink($car->img2);
                }
                $image2             = $request->file('img2');
                $image2Name         = "img2".time().".".$image2->getClientOriginalExtension();
                $directory          = '../mobileapi/asset/car/';
                $image2->move($directory, $image2Name);
                $image2Url          = $directory.$image2Name;
                $car->img2          = $image2Url;
            }
            if($request->hasFile('img3')){
                if(($car->img3 != null) && file_exists($car->img3)){
                    unlink($car->img3);
                }
                $image3             = $request->file('img3');
                $image3Name         = "img3".time().".".$image3->getClientOriginalExtension();
                $directory          = '../mobileapi/asset/car/';
                $image3->move($directory, $image3Name);
                $image3Url          = $directory.$image3Name;
                $car->img3          = $image3Url;
            }
            if($request->hasFile('img4')){
                if(($car->img4 != null) && file_exists($car->img4)){
                    unlink($car->img4);
                }
                $image4             = $request->file('img4');
                $image4Name         = "img4".time().".".$image4->getClientOriginalExtension();
                $directory          = '../mobileapi/asset/car/';
                $image4->move($directory, $image4Name);
                $image4Url          = $directory.$image4Name;
                $car->img4          = $image4Url;
            }
            if($request->hasFile('img5')){
                if(($car->img5 != null) && file_exists($car->img5)){
                    unlink($car->img5);
                }
                $image5             = $request->file('img5');
                $image5Name         = "img5".time().".".$image5->getClientOriginalExtension();
                $directory          = '../mobileapi/asset/car/';
                $image5->move($directory, $image5Name);
                $image5Url          = $directory.$image5Name;
                $car->img5          = $image5Url;
            }
            if($car->update()){
                return redirect()->route('backend.car.index')->with('message','Car update successfully');
            }else{
                return redirect()->route('backend.car.index')->with('error_message','Sorry, something went wrong');
            }
        }   
    }

    //car details
    public function details($id){
        $car = Car::find($id);
        return view('quicar.backend.car.details', compact('car'));
    }

    //car show with expired
    public function expired(){
        $cars = Car::join('owners','owners.api_token','cars.owner_id')
                        ->join('drivers','drivers.id','cars.driver_id')
                        ->select('cars.id','cars.name','cars.img1','cars.c_status','owners.name as owner_name','owners.phone as owner_phone',
                                'owners.n_key as owner_n_key','drivers.name as driver_name','drivers.phone as driver_phone',
                                'drivers.c_status as driver_current_status','drivers.license','drivers.nid','drivers.account_status'
                                )
                        ->get();
        return view('quicar.backend.car.expired', compact('cars'));
    }

}
