<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Compound;
use App\Traits\MyTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    use MyTrait;
    public function index($id) {
        $project_gallery =  Gallery::where('compound_id', $id)->get()->first();

        /* if(!$project_gallery){
            $project_gallery = array();
        } */

        $compound = Compound::where('id', $id)->first();

        return view('admin.galleries.index', compact('compound', 'project_gallery'));
    }

    public function save(Request $request){

        $project_name = Compound::where('id', $request->compound_id)->get()->first()->en_name;

        $data = array();

        $data['compound_id'] = $request->compound_id;


        if($files = $request->file('images')){
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('assets/images/gallery/'.$project_name, Carbon::now()->timestamp.$name);
                $images[] = Carbon::now()->timestamp.$name;
            }
            $data['images'] = implode("|", $images);
        }

        try {
            DB::beginTransaction();
            Gallery::create($data);
            DB::commit();
            return redirect()->route('admin.compound_gallery.index',[$request->compound_id])->with('success-msg', 'تم اضافة صورة جديد.');
        } catch (Exception $e) {
           DB::rollBack();
            return redirect()->route('admin.compound_gallery.index',[$request->compound_id])->with('success-msg', 'هناك خطاء.' . $e);
        }
    }

    public function delete($id, $compound_name){

        $current_gallery = Gallery::where('id', $id)->first();

        try {
            DB::beginTransaction();

            if(Gallery::find($id)->delete()){
                File::deleteDirectory('assets/images/gallery/'.$compound_name);
            }
            DB::commit();
            return redirect()->route('admin.compound_gallery.index',[$current_gallery->compound_id])->with('success-msg', 'تم حذف الصور بنجاح');

            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->route('admin.compound_gallery.index',[$current_gallery->compound_id])->with('success-msg', 'هناك خطاء.' . $e);
            }
        }

}
