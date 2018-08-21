<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Product;

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

    public static function slidesUploadImages ($imgs, $imageable_type, $link)
    {
        $image = [];
        foreach($imgs as $img)
        {
            $imageName = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('images/slide'), $imageName);
            $image[] = Image::create([
                'image' => $imageName,
                'imageable_id' => 0,
                'of_slide' => 1,
                'imageable_type' => $imageable_type,
                'link' => $link
            ]);
        }

        return $image;
    }
}
