<?php

namespace App\Http\Controllers\Api\V1\Freelancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Freelancer\FreelancerTypeData;

class FreelancerTypeDataController extends Controller
{
    public function index()
    {
        $freelancerTypeData = FreelancerTypeData::all();
        return response()->json($freelancerTypeData);
    }

    public function show($id)
    {
        $freelancerTypeData = FreelancerTypeData::findOrFail($id);
        return response()->json($freelancerTypeData);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'freelancerType' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        // Create a new freelancerTypeData entry
        FreelancerTypeData::create([
            'freelancerType' => $request->input('freelancerType'),

        ]);

        return response()->json(['message' => 'Freelancer Type data added successfully'], 201);
    }
}
