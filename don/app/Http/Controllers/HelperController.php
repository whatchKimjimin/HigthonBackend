<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelperController extends Controller
{
    public function getImages($id) {
        $imgPath = DB::table('images')->select('path')->where('id' , '=' , $id)->get();
        return response()->file(public_path().$imgPath[0]->path);
    }
}
