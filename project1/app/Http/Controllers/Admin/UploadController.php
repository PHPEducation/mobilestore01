<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;

class UploadController extends Controller
{
    public static function productUploadImages ($imgs, $imageable_type, $id)
    {
        $image = [];
        foreach($imgs as $img)
        {
            $imageName = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('images/products'), $imageName);
            $image[] = Image::create([
                'image' => $imageName,
                'imageable_id' => $id,
                'imageable_type' => $imageable_type
            ]);
        }

        return $image;
    }
}
