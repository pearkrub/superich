<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LengthAwarePaginator;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $path = storage_path('superdata.xml');
        $get = file_get_contents($path);
        $arr = simplexml_load_string($get);
        $con = json_encode($arr);
        $array = json_decode($con, true);
        $collection = collect($array['country']);

        $data = $collection->forPage($request->get('page', 1), $request->get('per_page', 10));
        return response()->json($collection, 200, []);
    }
}
