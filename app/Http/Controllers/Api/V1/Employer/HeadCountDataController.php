<?php

namespace App\Http\Controllers\Api\V1\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employer\HeadCountData;

class HeadCountDataController extends Controller
{
    public function index()
    {
        $headcountData = HeadCountData::all();
        return response()->json($headcountData);
    }

    public function show($id)
    {
        $headcountData = HeadCountData::findOrFail($id);
        return response()->json($headcountData);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'headcount' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        // Create a new headcountData entry
        HeadCountData::create([
            'headcount' => $request->input('headcount'),

        ]);

        return response()->json(['message' => 'Headcount data added successfully'], 201);
    }
}
