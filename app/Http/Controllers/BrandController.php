<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brand;
use File;
use Response;

class BrandController extends Controller
{
    public function getAllBrands()
    {
        return stripcslashes(Brand::all());

    }

    public function getBrandImage($name)
    {
        $path = storage_path() . '/brandvp/' . $name;

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
