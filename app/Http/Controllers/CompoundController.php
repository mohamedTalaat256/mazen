<?php

namespace App\Http\Controllers;

use App\Models\Compound;
use App\Models\CompoundAmenity;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\Property;
use App\Traits\MyTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CompoundController extends Controller
{
    use MyTrait;
    public function index()
    {
        $compounds = Compound::paginate(30);
        $is_home_page = false;
        return view('admin.compounds.index', compact('compounds', 'is_home_page'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $locations = Location::get();
        return view('admin.compounds.create', compact('locations'));
    }

    public function save(Request $request)
    {
        try {
            DB::beginTransaction();
            $home_background_file =  $this->saveImage($request->background_image, $request->en_name . '_home', 'assets/images/' . $request->type);
            $overview_background_file = $this->saveImage($request->overview_background, $request->en_name . '_overview', 'assets/images/' . $request->type);
            $cover_image_file = $this->saveImage($request->cover_image, $request->en_name . '_cover_image', 'assets/images/' . $request->type);
            $master_plan_image_file = $this->saveImage($request->master_plan_image, $request->en_name . '_master_plan_image', 'assets/images/' . $request->type);



            
            Compound::create([
                'cover_image' => $cover_image_file,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'location_on_map' => $request->location_on_map,
                'home_background'  => $home_background_file,
                'master_plan_image'  => $master_plan_image_file,
                'ar_overview' => $request->ar_overview,
                'en_overview' => $request->en_overview,
                'overview_background' => $overview_background_file,
                'status' => $request->status,
                'area_from' => $request->area_from,
                'area_to' => $request->area_to,
                'ar_location' => $request->ar_location,
                'en_location' => $request->en_location,
                'location_id' => $request->location_id,
                'type' => $request->type,
                'installments' => $request->installments,
                'payment_plans' => $request->payment_plans,
                'payment_years' => $request->payment_years,
                'start_price' => $request->start_price,
                'max_price' => $request->max_price
            ]);
            DB::commit();
            return redirect()->route('admin.compounds.create')->with('success-msg', 'compound saved success');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.compounds.create')->with('success-msg', 'هناك خطاء.' . $e);
        }
    }

    public function show($id)
    {
        $compound_gallery = Gallery::where('compound_id',  $id)->get()->first();
        $compound = Compound::where('compounds.id', $id)
        ->join('locations', 'locations.id', '=', 'compounds.location_id')
            ->select(
                'compounds.'.app()->getLocale() . '_name as name',
                'compounds.en_name',
                'compounds.location_on_map',
                'compounds.cover_image',
                'compounds.home_background',
                'compounds.master_plan_image',
                'compounds.'.app()->getLocale() . '_overview as overview',
                'compounds.overview_background',
                'compounds.status',
                'compounds.area_from',
                'compounds.area_to',
                'compounds.'.app()->getLocale() . '_location as location',
                'compounds.type',
                'compounds.installments',
                'compounds.payment_plans',
                'compounds.payment_years',
                'compounds.start_price',
                'compounds.max_price',
                'compounds.location_id',
                'locations.'.app()->getLocale() . '_name as location_name',
            )
            ->first();

           
        $amenities =  CompoundAmenity::where('compound_id', $id)
            ->join('amenities', 'amenities.id', '=', 'compound_amenities.amenity_id')
            ->select('amenities.' . app()->getLocale() . '_name as amenity_name', 'amenities.image as amenity_image')
            ->orderBy('compound_id', 'DESC')
            ->get();

        $properties =  Property::where('compound_id', $id)
       /*  ->join('locations', 'locations.id', '=', 'properties.location_id') */
        ->select(
            'id',
            app()->getLocale() . '_name as name',
            'en_name',
            'location_on_map',
            'cover_image',
            'home_background',
            app()->getLocale() . '_overview as overview',
            'overview_background',
            'status',
            'area_from',
            'area_to',
            app()->getLocale() . '_location as location',
            'type',
            'installments',
            'payment_plans',
            'payment_years',
            'start_price',
            'max_price',
            'location_id',

        )
        
        ->get();
            
        return view('compound', compact('compound', 'amenities', 'compound_gallery', 'properties'));
    }

    public function edit($id)
    {
        $compound = Compound::where('id', $id)->first();
        $compound_gallery = Gallery::where('compound_id',  $compound->id)->get();

        $locations = Location::get();

        return view('admin.compounds.edit', compact('compound', 'compound_gallery', 'locations'));
    }

    public function update(Request $request, Compound $client)
    {
        $home_background_file = $request->file('home_background');
        $cover_image_file = $request->file('cover_image');
        $overview_image_file = $request->file('overview_background');
        $master_plan_image_file = $request->file('master_plan_image');
        
        $data = array();

        try {
            DB::beginTransaction();

            if ($home_background_file) {
                $image_name =  $request->en_name . '_home_' . $home_background_file->getClientOriginalName();
                $home_background_file->move('assets/images/' . $request->type, $image_name);

                $data['home_background'] = $image_name;
            }


            if ($cover_image_file) {
                $image_name = $request->en_name . '_cover_image_' . $cover_image_file->getClientOriginalName();
                $cover_image_file->move('assets/images/' . $request->type, $image_name);

                $data['cover_image'] = $image_name;
            }

            if ($overview_image_file) {
                $image_name = $request->en_name . '_overview_' . $overview_image_file->getClientOriginalName();
                $overview_image_file->move('assets/images/' . $request->type, $image_name);

                $data['overview_background'] = $image_name;
            }


            if ($master_plan_image_file) {
                $image_name = $request->en_name . '_master_plan_image' . $master_plan_image_file->getClientOriginalExtension();
                $master_plan_image_file->move('assets/images/' . $request->type, $image_name);

                $data['master_plan_image'] = $image_name;
            }

            
            $data['ar_name'] = $request->ar_name;
            $data['en_name'] = $request->en_name;
            $data['location_on_map'] = $request->location_on_map;
            $data['ar_overview'] = $request->ar_overview;
            $data['en_overview'] = $request->en_overview;
            $data['status'] = $request->status;
            $data['area_from'] = $request->area_from;
            $data['area_to'] = $request->area_to;
            $data['ar_location'] = $request->ar_location;
            $data['en_location'] = $request->en_location;
            $data['location_id'] = $request->location_id;
            $data['type'] = $request->type;
            $data['installments'] = $request->installments;
            $data['payment_plans'] = $request->payment_plans;
            $data['payment_years'] = $request->payment_years;
            $data['start_price'] = $request->start_price;
            $data['max_price'] = $request->max_price;



            Compound::where('id', $request->id)->update($data);
            DB::commit();
            return redirect()->route('admin.compounds.index')->with('success-msg', 'compound updated success');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.compounds.index')->with('success-msg', 'هناك خطاء.' . $e);
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            if (Gallery::where('compound_id', $id)->get()->isNotEmpty()) {
                return redirect()->route('admin.compounds.index')->with('success-msg', 'يجب حذف صور المعرض اولا');
            } else {
                $current_subproject = Compound::where('id', $id)->first();

                $cover_image = $current_subproject->cover_image;
                $home_background = $current_subproject->home_background;
                $overview_background = $current_subproject->overview_background;
                $type = $current_subproject->type;

                if (Compound::find($id)->delete()) {
                    File::delete('assets/images/' . $type . '/' . $cover_image);
                    File::delete('assets/images/' . $type . '/' . $home_background);
                    File::delete('assets/images/' . $type . '/' . $overview_background);
                }
                DB::commit();
                return redirect()->route('admin.compounds.index')->with('success-msg', 'deleted success');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.compounds.index')->with('danger', 'هناك خطاء.' . $e);
        }
    }
}
