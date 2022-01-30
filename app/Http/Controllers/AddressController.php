<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getAllCities()
    {
        $cities = City::get();

        return response()->json([
            'status' => 1,
            'message' => 'All cities',
            'data' => $cities
        ]);
    }

    public function getAllStates()
    {
        $states = State::get();
        return response()->json([
            'status' => 1,
            'message' => 'All states',
            'data' => $states
        ]);
    }

    public function getCitiesOfState($state_id)
    {
        $state = State::with('cities')->find($state_id);
        if($state == null) {
            return response()->json([
                'status' => 0,
                'message' => 'This State Was Not Found',
                'data' => null
            ]);
        }
        $cities = $state -> cities -> makeHidden('state_id');
        $state = $state->title;

        return response()->json([
            'status' => 1,
            'message' => 'کل شهرهای استان ' . $state,
            'data' => $cities
        ]);
    }
}
