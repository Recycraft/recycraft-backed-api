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
    $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $imageFile = $dom->getElementsByTagName('imageFile');

    foreach($imageFile as $item => $image){
      $data = $image->getAttribute('src');
      if (strpos($data, 'base64')){
          list($type, $data) = explode(';', $data);
          list(, $data)      = explode(',', $data);
          $imgeData = base64_decode($data);
          $image_name= "/upload/" . time().$item.'.png';
          $path = public_path() . $image_name;
          file_put_contents($path, $imgeData);

          $image->removeAttribute('src');
          $image->setAttribute('src', $image_name);
      } else {
          $image_name = '/'.$data;
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
    $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $imageFile = $dom->getElementsByTagName('imageFile');

    foreach($imageFile as $item => $image){
        $data = $image->getAttribute('src');
        Storage::delete($data);
    }
  }
}