<?php
namespace App\Traits;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
Trait ImageTrait
{

    function saveImage($folder ,$photo){

        $file_name=$photo->hashName();
//        if (request()->getHttpHost() == 'localhost') {

            $file_name=$photo->hashName();
            $path=public_path($folder);
            File::exists($path) or File::makeDirectory($path); // this seems to be the issue

            Image::make($photo)->save(public_path($folder.$file_name));
//        }
//        else{
//            $path = storage_path($folder);
//
//            File::exists($path) or File::makeDirectory($path); // this seems to be the issue
//
//            Image::make($photo)->save(storage_path($folder.$file_name));
//
//        }



        return $file_name;
    }
    function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = $filename;
        return $path;
    }
    function savePDF($folder,$photo){
//dd($photo);
        $file_name = time().'.'.$photo->extension();

        $photo->move(public_path($folder), $file_name);
//dd(public_path($folder).$file_name);
        return $file_name;
    }

}


