<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Traits\MyTrait;
use Exception;
use Illuminate\Http\Request;

class PropertyAmenityController extends Controller
{
    use MyTrait;
    public function index($property_id)
    {

       $property = Property::where('id', $property_id)->get()->first();



        $property_amenities =  PropertyAmenity::where('property_id', $property_id)
            ->join('amenities', 'amenities.id', '=', 'property_amenities.amenity_id')
            ->join('properties', 'properties.id', '=', 'property_amenities.property_id')
            ->select( 
                'properties.id as property_id', 
                'amenities.id as amenity_id',
                'properties.en_name as property_name',
                'amenities.en_name as amenity_name',
                )
            ->orderBy('property_id', 'DESC')
            ->get();

        $amenities =  Amenity::get();

        return view('admin.property_amenities.index', compact('property','property_amenities', 'amenities'));
    }




    public function save(Request $request)
    {


      //  return $request;
        $data = array();
        $data['property_id'] = $request->property_id;
        $data['amenity_id'] = $request->amenity_id;

        try {

            PropertyAmenity::create($data);

            return redirect()->route('admin.property_amenities.index', ['property_id'=>$request->property_id])->with('success-msg', 'added success');
        } catch (Exception $ex) {
            return redirect()->route('admin.property_amenities.index', ['property_id'=>$request->property_id])->with('success-msg', 'هناك خطاء.' . $ex);
        }
    }

    public function edit($id)
    {
        $amenity =  Amenity::where('id', $id)->get()->first();
        return view('admin.amenities.edit', compact('amenity'));
    }
}
