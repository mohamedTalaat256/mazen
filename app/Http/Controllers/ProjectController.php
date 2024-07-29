<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Project;
use App\Models\Compound;
use App\Traits\MyTrait;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use MyTrait;
    public function index($project_type){
        $project = Project::where('type', $project_type)
        ->select(
            app()->getLocale().'_name as name',
            'type',
            'background_image',
            'cover_image'
            )
        ->first();

        $compounds = Compound::where('type', $project_type)
        ->select( 'id',app()->getLocale().'_name as name', 'type', 'cover_image')
        ->get();
        $is_home_page = false;


        $locations = Location::select('id', app()->getLocale().'_name as name', 'cover_image')->get();

        return view('project', compact('compounds', 'project', 'is_home_page', 'locations'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function getProjectsByLocation($project_location, $project_type){
        $location = Location::where('id', $project_location)
        ->select(
            app()->getLocale().'_name as name',
            'home_image',
            'cover_image'
            )
        ->first();

        $compounds = Compound::where('location_id', $project_location)
        ->where('type', $project_type)
        ->select( 'id',app()->getLocale().'_name as name', 'type', 'cover_image')
        ->get();
        $is_home_page = false;

        return view('locations', compact('compounds', 'location', 'is_home_page'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function mainProjects()
    {
        $main_projects = Project::get();
        return view('admin.projects.index', compact('main_projects'));
    }
    public function editProject($id)
    {
        $project = Project::where('id', $id)->first();
        return view('admin.projects.edit', compact('project'));
    }
    public function updateProject(Request $request)
    {

        $cover_image_file = $request->file('cover_image');
        $background_image_file = $request->file('background_image');

        $data = array();

        if($background_image_file){
            $image_name = $background_image_file->getClientOriginalName();
            $background_image_file->move('assets/images/'.$request->type , $request->type.'_home.png');
            $image =  $request->type.'_home.png';

            $data['background_image'] = $image;
        }

        if($cover_image_file){

            $image_name = $cover_image_file->getClientOriginalName();
            $cover_image_file->move('assets/images/home/', $request->type.'.png');
            $image = $request->type.'png';

            $data['cover_image'] = $image;
        }

        $data['en_name'] = $request->en_name;
        $data['ar_name'] = $request->ar_name;

        Project::where('id', $request->id)->update( $data );
        return redirect()->route('edit_project',['id'=> $request->id]);
    }
}
