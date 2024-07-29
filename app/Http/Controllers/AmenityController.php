<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Traits\MyTrait;
use Exception;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    use MyTrait;
    public function index() {
        $amenities =  Amenity::get();
        return view('admin.amenities.index', compact('amenities'));
    }




    public function save(Request $request){
        $data = array();
        $data['en_name'] = $request->en_name;
        $data['ar_name'] = $request->ar_name;

        try{
            $image_file = $request->file('image');

            if($image_file){
                $image_name = 'amenity_'.$request->en_name.$image_file->getClientOriginalName();
                $image_file->move('assets/images/amenities', $image_name);
                $data['image'] = $image_name;
            }

            Amenity::create($data);

            return redirect()->route('admin.amenities.index')->with('success-msg', 'added success');
        }catch(Exception $ex){
            return redirect()->route('admin.amenities.index')->with('success-msg', 'هناك خطاء.' . $ex);

        }
    }

    public function edit($id){
        $amenity =  Amenity::where('id', $id)->get()->first();
        return view('admin.amenities.edit', compact('amenity'));

    }
    public function update( Request $request ){


        $data = array();
        $data['en_name'] = $request->en_name;
        $data['ar_name'] = $request->ar_name;

        try{
            $image_file = $request->file('image');

            if($image_file){
                $image_name = 'amenity_'.$request->en_name.$image_file->getClientOriginalName();
                $image_file->move('assets/images/amenities', $image_name);
                $data['image'] = $image_name;
            }

            Amenity::where('id', $request->amenity_id)->update($data);

            return redirect()->route('admin.amenities.index')->with('success-msg', 'updated success');
        }catch(Exception $ex){
            return redirect()->route('admin.amenities.index')->with('success-msg', 'هناك خطاء.' . $ex);

        }

    }



}
