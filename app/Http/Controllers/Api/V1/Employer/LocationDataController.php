<?php

namespace App\Http\Controllers\Api\V1\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employer\LocationData;

class LocationDataController extends Controller
{
    public function index()
    {
        $locationData = LocationData::all();
        return response()->json($locationData);
    }

    public function show($id)
    {
        $locationData = LocationData::findOrFail($id);
        return response()->json($locationData);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'location' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        // Create a new locationData entry
        LocationData::create([
            'location' => $request->input('location'),

        ]);

        return response()->json(['message' => 'Location data added successfully'], 201);
    }
}
