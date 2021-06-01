<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;

class CityController extends Controller
{
     public function store(Request $request)
    {
         City::create($request->all());
        return response()->json(['message' => 'la ciudad ha sido creada'], 200);
    }

      public function indexTwo($id)
    {
        $word = City::where('topic_id', $id)->orderBy('pun','ASC')->get();
        return $word;
    }
}