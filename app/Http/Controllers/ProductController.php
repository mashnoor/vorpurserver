<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use File;
use Response;

class ProductController extends Controller
{
    public function getProduct($id)
    {

        $product = Product::where('id', '=', $id)->first();
        return stripcslashes($product);

    }
    public function getProductImage($id)
    {
        $path = storage_path() . '/' . "prod_" . $id . ".jpg";

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

}
