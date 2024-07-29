<?php

namespace App\Http\Controllers;


use App\Models\HomeSlider;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SiteController extends Controller
{
    public function siteSettings()
    {
        $site_info = Setting::first();


        return view('admin.settings.index', compact('site_info'));
    }

    public function UpdateSiteSettings(Request $request)
    {
        $data = array();
        $image_file = $request->file('site_logo');


        if($image_file){
            $image_name = $image_file->getClientOriginalName();
            $image_file->move('assets/images/home', 'site_logo.png');
            $image =  'site_logo.png';

            $data['site_logo'] = $image;
        }


        $data['phone'] = $request->phone;
        $data['ar_about'] = $request->ar_about;
        $data['en_about'] = $request->en_about;
        $data['email'] = $request->email;
        $data['ar_address'] = $request->ar_address;
        $data['en_address'] = $request->en_address;


        Setting::where('id', 1)->update($data);

        return redirect()->route('site_setting')->with('success-msg', 'updated success.');
    }




   public function sliderImages()
   {

    $slider_images = HomeSlider::get();

    return view('admin.home_slider.index', compact('slider_images'));

   }

   public function createSliderImages()
   {
        return view('admin.home_slider.create');
   }


   public function storeSliderImages(Request $request)
   {

    $data = array();
    $image_file = $request->file('image');


    try{
        $image_name = $image_file->getClientOriginalName();
        $image_file->move('assets/images/home', 'home_slider_'.$request->id.'.png');
        $image =  'home_slider_'.$request->id.'.png';

        $data['image'] = $image;

        $data['caption_big'] = $request->caption_big;
        $data['caption_small'] = $request->caption_small;

        HomeSlider::create($data);

        return redirect()->route('all_slider_images')->with('success-msg', 'updated success.');
    }catch(Exception $e){
        return redirect()->route('all_slider_images')->with('success-msg', $e);
    }

   }

   public function EditsliderImages($id)
   {

    $slider_item = HomeSlider::where('id', $id)->first();


    //return $slider_item;

    return view('admin.home_slider.edit', compact('slider_item'));

   }

   public function deleteSliderImage($id){

    $slider_item = HomeSlider::where('id', $id)->first();



    HomeSlider::where('id', $id)->delete();


    File::delete('assets/images/home/'. $slider_item->image);

    return redirect()->route('all_slider_images')->with('success-msg', 'deleted success.');

   }


   public function updateSliderImages(Request $request)
   {

    $data = array();
    $image_file = $request->file('image');


    if($image_file){
        $image_name = $image_file->getClientOriginalName();
        $image_file->move('assets/images/home', 'home_slider_'.$request->id.'.png');
        $image =  'home_slider_'.$request->id.'.png';

        $data['image'] = $image;
    }

    $data['caption_big'] = $request->caption_big;
    $data['caption_small'] = $request->caption_small;


    HomeSlider::where('id', $request->id)->update($data);

    return redirect()->route('all_slider_images')->with('success-msg', 'updated success.');

   }



   public function backup()
   {
        //delete all backups
        Storage::deleteDirectory('Laravel');

        //make new backup
        Artisan::call('backup:run');
        //dd(Artisan::output());


        //download that backup
        $backups = Storage::allFiles('tvi');


        return Storage::download($backups[0]);
   }
}
