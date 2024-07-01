<?php

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


// Str Pad Left Function
if (!function_exists('getStrPad')) {
  function getStrPad($value)
  {
    return str_pad($value, 2, '0', STR_PAD_LEFT);
  }
}
// Str Pad Left Function

// Image Intervention Function
// if (!function_exists('getImageIntervention')) {
//   function getImageIntervention($value)
//   {
//     if (isset($requestData['image'])) {
//       $image = $requestData['image'];
//       $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

//       // Save original image
//       $image->move(public_path('storage/partners'), $imageName);

//       // create new manager instance with desired driver
//       $imgManager = new ImageManager(new Driver());
//       $imagePath = $imgManager->read(public_path('storage/partners/') . $imageName);

//       // Resize image
//       $imagePath->resize(170, 80);
//       $imagePath->save();

//       return $imageName;
//     }

//     return str_pad($value, 2, '0', STR_PAD_LEFT);
//   }
// }
// Image Intervention Function
