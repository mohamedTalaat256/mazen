<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Location;
use App\Traits\MyTrait;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    use MyTrait;
    public function index(){
        $locations = Location::paginate(30);
        return view('admin.locations.index', compact('locations'));

    }
    public function create()
    {
       return view('admin.locations.create');
    }
   public function store(Request $request){

    $cover_image_file = $request->file('cover_image');
    $cover_image_name =  $request->en_name.$cover_image_file->getClientOriginalName();
    $cover_image_file->move('assets/images/locations/' , $cover_image_name);


    $home_image_file = $request->file('home_image');
    $home_image_name =  $request->en_name.$home_image_file->getClientOriginalName();
    $home_image_file->move('assets/images/locations/' , $home_image_name);



    try{
            Location::create([
                'en_name' => $request->en_name,
                'ar_name' => $request->ar_name,
                'cover_image' => $cover_image_name,
                'home_image' => $home_image_name,
            ]);
            return redirect()->route('locations.index')->with('success-msg', 'added success');

        }catch(Exception $ex){
            return redirect()->route('locations.index')->with('success-msg', 'added error'. $ex);

        }
   }

   public function show(Location $location)
    {
        return 1;// view('companies.show',compact('company'));
    }

   public function edit(Location $location)
   {
        return view('admin.locations.edit', compact('location'));
   }

   public function update(Request $request, Location $location)
   {
        $id = $request->id;
        
        $data = array();
        
        
        $data['en_name'] = $request->en_name;
        $data['ar_name'] = $request->ar_name;
        
        $cover_image_file = $request->file('cover_image');
        $home_image_file = $request->file('home_image');
        
        
        if($cover_image_file){
                $image_name = 'cover_'.$request->en_name.$cover_image_file->getClientOriginalName();
                $cover_image_file->move('assets/images/locations/' , $image_name);
                $data['cover_image'] = $image_name;
        }
        
        
        if($home_image_file){
            $image_name = 'home_'.$request->en_name.$home_image_file->getClientOriginalName();
            $home_image_file->move('assets/images/locations/' , $image_name);

            $data['home_image'] = $image_name;
        }
        
        
       

        try{
            Location::where('id', $id)->update($data);

            return redirect()->route('locations.index')->with('success-msg', 'update success');
   
        }catch(Exception $ex){
            return redirect()->route('locations.index')->with('success-msg', 'update fail'.$ex);

        }
   }

   public function destroy(Location $location){

    try{
        $location->delete();
            return redirect()->route('locations.index')->with('success', 'delete success.' );

        }catch(Exception $ex){
            return redirect()->route('locations.index')->with('danger', 'delete error' . $ex);
        }
   }



}
