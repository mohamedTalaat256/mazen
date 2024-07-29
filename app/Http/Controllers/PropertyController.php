<?php

namespace App\Http\Controllers;

use App\Models\Compound;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyGallery;
use App\Models\Location;
use App\Traits\MyTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    use MyTrait;
    public function index()
    {
        $properties = Property::paginate(30);
        $is_home_page = false;
        return view('admin.properties.index', compact('properties', 'is_home_page'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $locations = Location::get();
        $compounds = Compound::get();
        return view('admin.properties.create', compact('locations' ,'compounds'));
    }

    public function save(Request $request)
    {

        //return $request;

        try {
            DB::beginTransaction();
            $home_background_file =  $this->saveImage($request->background_image, $request->en_name . '_home', 'assets/images/' . $request->type.'/properties');
            $overview_background_file = $this->saveImage($request->overview_background, $request->en_name . '_overview', 'assets/images/' . $request->type.'/properties');
            $cover_image_file = $this->saveImage($request->cover_image, $request->en_name . '_cover_image', 'assets/images/' . $request->type.'/properties');
            $master_plan_image_file = $this->saveImage($request->master_plan_image, $request->en_name . '_master_plan_image', 'assets/images/' . $request->type);


            Property::create([
                'cover_image' => $cover_image_file,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'location_on_map'=>$request->location_on_map,
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
                'compound_id' => $request->compound_id,
                'type' => $request->type,
                'installments' => $request->installments,
                'payment_plans' => $request->payment_plans,
                'payment_years' => $request->payment_years,
                'start_price' => $request->start_price,
                'max_price' => $request->max_price,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'deliverd_in' => $request->deliverd_in
            ]);
            DB::commit();
            return redirect()->route('admin.properties.index')->with('success-msg', 'تم اضافة مشروع جديد.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.properties.index')->with('success-msg', 'هناك خطاء.' . $e);
        }
    }

    public function show($id)
    {
        $property_gallery = PropertyGallery::where('property_id',  $id)->get()->first();
        $property = Property::where('id', $id)
            ->select(
                app()->getLocale() . '_name as name',
                'en_name',
                'location_on_map',
                'cover_image',
                'home_background',
                'master_plan_image',
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
                'compound_id',
                'bedrooms',
                'bathrooms',
                'deliverd_in',
            )
            ->first();
        $is_home_page = false;
        $project_location = Location::where('id', $property->location_id)->select(app()->getLocale() . '_name as location_name')->first();
        $property_compound = Location::where('id', $property->compound_id)->select(app()->getLocale() . '_name as location_name')->first();


        $amenities =  PropertyAmenity::where('property_id', $id)
            ->join('amenities', 'amenities.id', '=', 'property_amenities.amenity_id')
            ->select( 'amenities.'.app()->getLocale().'_name as amenity_name' , 'amenities.image as amenity_image')
            ->orderBy('property_id', 'DESC')
            ->get();


        $more_properties = Property::where('compound_id', $property->compound_id)
        ->select(
            'id',
            app()->getLocale() . '_name as name',
            'en_name',
            'location_on_map',
            'cover_image',
            'home_background',
            'master_plan_image',
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
            'compound_id',
            'bedrooms',
            'bathrooms',
            'deliverd_in',
        )->get();

        return view('property', compact('property', 'amenities', 'property_gallery', 'is_home_page', 'project_location', 'property_compound', 'more_properties'));
    }

    public function edit($id)
    {
        $property = Property::where('id', $id)->first();
        $property_gallery = PropertyGallery::where('property_id',  $property->id)->get();

        $locations = Location::get();
        $compounds = Compound::get();
        return view('admin.properties.edit', compact('property', 'property_gallery', 'locations', 'compounds'));
    }

    public function update(Request $request, Property $client)
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
                $home_background_file->move('assets/images/' . $request->type.'/properties', $image_name);

                $data['home_background'] = $image_name;
            }


            if ($cover_image_file) {
                $image_name = $request->en_name . '_cover_image_' . $cover_image_file->getClientOriginalName();
                $cover_image_file->move('assets/images/' . $request->type.'/properties', $image_name);

                $data['cover_image'] = $image_name;
            }

            if ($overview_image_file) {
                $image_name = $request->en_name . '_overview_' . $overview_image_file->getClientOriginalName();
                $overview_image_file->move('assets/images/' . $request->type.'/properties', $image_name);

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
            $data['compound_id'] = $request->compound_id;
            $data['type'] = $request->type;
            $data['installments'] = $request->installments;
            $data['payment_plans'] = $request->payment_plans;
            $data['payment_years'] = $request->payment_years;
            $data['start_price'] = $request->start_price;
            $data['max_price'] = $request->max_price;
            $data['bedrooms'] = $request->bedrooms;
            $data['bathrooms'] = $request->bathrooms;
            $data['deliverd_in'] = $request->deliverd_in;


            Property::where('id', $request->id)->update($data);
            DB::commit();
            return redirect()->route('admin.properties.index')->with('success-msg', 'property updated success.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.properties.index')->with('success-msg', 'هناك خطاء.' . $e);
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            if (PropertyGallery::where('property_id', $id)->get()->isNotEmpty()) {

                return redirect()->route('admin.properties.index')->with('success-msg', 'يجب حذف صور المعرض اولا');
            } else {
                $current_property = Property::where('id', $id)->first();

                $cover_image = $current_property->cover_image;
                $home_background = $current_property->home_background;
                $overview_background = $current_property->overview_background;
                $type = $current_property->type;

                if (Property::find($id)->delete()) {
                    File::delete('assets/images/' . $type . '/properties' . $cover_image);
                    File::delete('assets/images/' . $type . '/properties' . $home_background);
                    File::delete('assets/images/' . $type . '/properties' . $overview_background);
                }
                DB::commit();
                return redirect()->route('admin.properties.index')->with('success-msg', 'deleted success');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.properties.index')->with('danger', 'هناك خطاء.' . $e);
        }
    }




    public function getSearch() {
        $is_home_page = false;

        $compounds = Compound::select(
            'id',
            app()->getLocale() . '_name as name',
            'type',
            'cover_image',
        ) ->get();

        return view('search', compact('is_home_page', 'compounds'));
        
    }



    public function postSearch(Request $request) {



        $properties = Property::where('compound_id', $request->compound_id)
        ->where('type', $request->type)
        ->where('bedrooms', $request->bedrooms)
        ->select(
            'id',
            app()->getLocale() . '_name as name',
            'en_name',
            'location_on_map',
            'cover_image',
            'home_background',
            'master_plan_image',
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
            'compound_id',
            'bedrooms',
            'bathrooms',
            'deliverd_in',
        )->get();

        return $properties;
        
    }
}
