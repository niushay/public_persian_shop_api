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
            'status' => 1,
            'message' => 'All cities',
            'cities' => $cities
        ]);
    }

    public function getAllStates()
    {
        $states = State::all();
        return response()->json([
            'status' => 1,
            'message' => 'All states',
            'cities' => $states
        ]);
    }

    public function getCitiesOfState($state_id)
    {
        $state = State::with('cities')->find($state_id);
        if($state == null) {
            return response()->json([
                'status' => 0,
                'message' => 'This State Was Not Found',
                'cities' => null
            ]);
        }
        $cities = $state -> cities -> makeHidden('state_id');
        $state = $state->title;

        return response()->json([
            'status' => 1,
            'message' => 'کل شهرهای استان ' . $state,
            'cities' => $cities
        ]);
    }
}
