<?php

namespace App\Http\Controllers;

use App\Models\PropertyGallery;
use App\Models\Property;
use App\Traits\MyTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PropertyGalleryController extends Controller
{
    use MyTrait;
    public function index($id) {
        $property_gallery =  PropertyGallery::where('property_id', $id)->get()->first();

        $property = Property::where('id', $id)->first();

        return view('admin.property_galleries.index', compact('property', 'property_gallery'));
    }




    public function store(Request $request){

        $property_name = Property::where('id', $request->property_id)->get()->first()->en_name;

        $data = array();

        $data['property_id'] = $request->property_id;


        if($files = $request->file('images')){
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('assets/images/property_gallery/'.$property_name, Carbon::now()->timestamp.$name);
                $images[] = Carbon::now()->timestamp.$name;
            }
            $data['images'] = implode("|", $images);
        }

        try {
            DB::beginTransaction();
            PropertyGallery::create($data);
            DB::commit();
            return redirect()->route('property_gallery',[$request->property_id])->with('success-msg', 'تم اضافة صورة جديد.');
        } catch (Exception $e) {
           DB::rollBack();
            return redirect()->route('property_gallery',[$request->property_id])->with('success-msg', 'هناك خطاء.' . $e);
        }
    }

    public function destroy($id, $property_name){

        $current_gallery = PropertyGallery::where('id', $id)->first();

        try {
            DB::beginTransaction();

            if(PropertyGallery::find($id)->delete()){
                File::deleteDirectory('assets/images/property_gallery/'.$property_name);
            }
            DB::commit();
            return redirect()->route('property_gallery',[$current_gallery->property_id])->with('success-msg', 'تم حذف الصور بنجاح');

            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->route('property_gallery',[$current_gallery->property_id])->with('success-msg', 'هناك خطاء.' . $e);
            }
        }

}
