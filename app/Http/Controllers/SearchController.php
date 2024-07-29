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

class SearchController extends Controller
{
    use MyTrait;
    public function homeSearch(Request $request)
    {
        $key = $request->key;
        $value = $request->value;


        if($key == 'compound_id'){

            $compound = Compound::where('en_name', $value)
            ->orWhere('ar_name', $value)
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
                'location_id'
            )->first();
           
            $area = Location::where('id', $compound->location_id)->select(
                app()->getLocale() . '_name as name',
                'home_image',
                'cover_image'
            )->first();

            
            $all_properties_in_compound = Property::where('compound_id', $compound->id)
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

            return $area;

        }else if($key == 'location_id'){

            $area = null;
            $all_compounds_in_location = null;
            $all_properties_in_all_compounds_in_locations = null;
            
        }

        return $request->key;
       
    }



    public function getSearch(){

        return view('search');
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







}
