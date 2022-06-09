<?php

use Illuminate\Support\Facades\Storage;

/**
 * This function process data from summernote and upload all the photos inside the editor.
 * 
 * @return response()
 */
if (! function_exists('processSummernote')) {
  function processSummernote($content)
  {
    $dom = new \DomDocument();
    @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $imageFile = $dom->getElementsByTagName('img');

    foreach($imageFile as $item => $image){
      $data = $image->getAttribute('src');
      if (strpos($data, 'base64')){
        $folderPath = 'uploads/';
        $image_64 = $data; //your base64 encoded data
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 

        // find substring fro replace here eg: data:image/png;base64,
        $imageToSave = str_replace($replace, '', $image_64); 
        $imageToSave = str_replace(' ', '+', $imageToSave); 
        $imageName = $folderPath . uniqid() . '.'.$extension;

        Storage::disk('public')->put($imageName, base64_decode($imageToSave));
        $path = Storage::url($imageName);

        $image->removeAttribute('src');
        $image->setAttribute('src', $path);
      } else {
        $image_name = $data;
        $image->setAttribute('src', $image_name);
      }
    }

    $content = $dom->saveHTML();
    return $content;
  }
}

if (!function_exists('summernoteDeleteImage')){
  function summernoteDeleteImage($content){
    $dom = new \DomDocument();
    @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $imageFile = $dom->getElementsByTagName('img');

    foreach($imageFile as $item => $image){
        $data = $image->getAttribute('src');
        $imageName = str_replace(url('/storage'), '', $data);
        $imageName = substr($imageName, 1);
        Storage::delete($imageName);
    }
  }
}