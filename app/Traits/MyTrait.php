<?php
namespace App\Traits;


use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Trait MyTrait{

    function saveImage($photo,$home_or_overview, $folder){
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = $home_or_overview.'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);

        return $file_name;
    }

    function saveGalleryImage($photo,$image_name, $folder){
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = $image_name.'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);

        return $file_name;
    }


}
?>
