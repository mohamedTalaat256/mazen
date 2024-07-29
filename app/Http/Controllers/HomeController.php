<?php

namespace App\Http\Controllers;

use App\Models\Compound;
use App\Models\Gallery;
use App\Models\HomeSlider;
use App\Models\Location;
use App\Models\Project;
use App\Models\Setting;
use App\Models\TopCompound;

class HomeController extends Controller
{

    public function __construct()
    {
        //  $this->middleware('auth');
    }

    public function index()
    {
        $is_home_page = true;


      

        $site_info = Setting::first();

        $locations = Location::select('id', app()->getLocale() . '_name as name', 'cover_image')->get();

        $projects = Project::select(
            app()->getLocale() . '_name as name',
            'type',
            'cover_image'
        )->get();

        $top_compounds = TopCompound::join('compounds', 'compounds.id', '=', 'top_compounds.compound_id')
            ->select(
                'top_compounds.id as top_compound_id',
                'top_compounds.compound_order as compound_order',
                'compounds.id',
                'compounds.type',
                'compounds.cover_image',
                'compounds.start_price',
                'compounds.max_price',
                'compounds.'.app()->getLocale() . '_name as name',
            )
            ->orderBy('compound_order')
            ->get();

        $top_areas  = Location::select(
            app()->getLocale() . '_name as name',
            'home_image',
            'cover_image'
        )->get();

        $all_compounds = Compound::select(
            app()->getLocale() . '_name as name',
            'cover_image'
        )->get();
 



        return view('home.home', compact( 'site_info', 'projects', 'all_compounds', 'locations', 'top_compounds', 'top_areas'));
    }





    public function compound()
    {

        $is_home_page = false;

        $gallery = Gallery::where('compound_id',  17)->get()->first();

        return view('compound', compact('is_home_page', 'gallery'));
    }
}
