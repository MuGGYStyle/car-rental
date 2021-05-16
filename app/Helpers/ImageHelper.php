<?php
namespace App\Helpers;

use File;
 
class ImageHelper {
  public static function uploadImage($request, $path, $parName = 'image') {
    $filename = null;

    if ($request->hasFile($parName)) {
      $filename = $request->file($parName)->storeAs($path, time().'.jpg', 'public');
    }

    return env('APP_URL').'/storage/'.$filename;
  }

  public static function unlinkImage($path) {
    if(File::exists($path)) {
      File::delete($path);
  }
  }
}