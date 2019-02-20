<?php  

namespace App\Helpers\Classes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UploadClass extends Controller
{

    /* todo
        remove this class if not use it
    */
	
	public static function uploadImage($request, $name_image, $path)
	{
		$file = $request->file($name_image);
    	$fileNameToStore =  rand(20,60000) .uniqid(). '.' . $file->getClientOriginalExtension();
    	$path = $file->storeAs($path, $fileNameToStore);
    	return $fileNameToStore;
	}

	public static function uploadImageMulti($request, $name_image, $key, $path)
	{
		$file = $request->file($name_image)[$key];
    	$fileNameToStore =  rand(20,60000) .uniqid(). '.' . $file->getClientOriginalExtension();
    	$path = $file->storeAs($path, $fileNameToStore);
    	return $fileNameToStore;
	}

}


















?> 























