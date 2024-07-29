<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Compound;
use App\Models\CompoundAmenity;
use App\Traits\MyTrait;
use Exception;
use Illuminate\Http\Request;

class CompoundAmenityController extends Controller
{
    use MyTrait;
    public function index($compound_id)
    {

       $compound = Compound::where('id', $compound_id)->get()->first();



        $compound_amenities =  CompoundAmenity::where('compound_id', $compound_id)
            ->join('amenities', 'amenities.id', '=', 'compound_amenities.amenity_id')
            ->join('compounds', 'compounds.id', '=', 'compound_amenities.compound_id')
            ->select( 
                'compounds.id as compound_id', 
                'amenities.id as amenity_id',
                'compounds.en_name as compound_name',
                'amenities.en_name as amenity_name',
                )
            ->orderBy('compound_id', 'DESC')
            ->get();

        $amenities =  Amenity::get();
        
        return view('admin.compound_amenities.index', compact('compound','compound_amenities', 'amenities'));
    }




    public function save(Request $request)
    {


      //  return $request;
        $data = array();
        $data['compound_id'] = $request->compound_id;
        $data['amenity_id'] = $request->amenity_id;

        try {

            CompoundAmenity::create($data);

            return redirect()->route('admin.compound_amenities.index', ['compound_id'=>$request->compound_id])->with('success-msg', 'added success');
        } catch (Exception $ex) {
            return redirect()->route('admin.compound_amenities.index', ['compound_id'=>$request->compound_id])->with('success-msg', 'هناك خطاء.' . $ex);
        }
    }

    public function delete($compound_id, $amenity_id)
    {
        try {

            CompoundAmenity::where('compound_id', $compound_id)->where('amenity_id', $amenity_id)->delete();

            return redirect()->route('admin.compound_amenities.index', ['compound_id'=>$compound_id])->with('success-msg', 'deleted success');
        } catch (Exception $ex) {
            return redirect()->route('admin.compound_amenities.index', ['compound_id'=>$compound_id])->with('success-msg', 'هناك خطاء.' . $ex);
        }
        
    }
}
