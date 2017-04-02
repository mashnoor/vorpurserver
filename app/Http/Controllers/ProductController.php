<?php

namespace App\Http\Controllers;

use App\Like;
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
    public function getProductImage($filename)
    {
        $path = storage_path() . '/product_image/' . $filename;

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function isLiked($productid, $userid)
    {
        $product = Product::findOrFail($productid)->first();


        if (Like::whereUserId($userid)->whereProductId($productid)->exists()){
            return 'true';
        }
        return 'false';
    }

    public function like($productid, $userid)
    {
        echo $userid;
        $existing_like = Like::whereProductId($productid)->whereUserId($userid)->first();

        if (is_null($existing_like)) {
           $l = new Like();
            $l->user_id = $userid;
            $l->product_id = $productid;
            $l->save();



        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }

    public function get_latest_three()
    {
        $latest_products = Product::orderBy('created_at', 'desc')
                              ->take(3)->get();


        return $latest_products;
    }
}
