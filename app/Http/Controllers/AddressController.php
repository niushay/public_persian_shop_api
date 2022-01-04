<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getAllCities()
    {
        $cities = City::all();

        return response()->json([
            'status' => 'ok',
            'message' => 'All cities',
            'cities' => $cities
        ]);
    }

    public function getAllStates()
    {
        $states = State::all();
        return response()->json([
            'status' => 'ok',
            'message' => 'All states',
            'cities' => $states
        ]);
    }
}
