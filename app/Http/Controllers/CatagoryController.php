<?php

namespace App\Http\Controllers;

use App\Catagory;
use Illuminate\Http\Request;

use App\Http\Requests;

class CatagoryController extends Controller
{
    public function getAllCatagory()
    {
        return stripcslashes(Catagory::all());

    }
}
