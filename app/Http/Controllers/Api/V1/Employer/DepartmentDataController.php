<?php

namespace App\Http\Controllers\Api\V1\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employer\DepartmentData;

class DepartmentDataController extends Controller
{
    public function index()
    {
        $departmentData = DepartmentData::all();
        return response()->json($departmentData);
    }

    public function show($id)
    {
        $departmentData = DepartmentData::findOrFail($id);
        return response()->json($departmentData);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'department' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        // Create a new DepartmentData entry
        DepartmentData::create([
            'department' => $request->input('department'),

        ]);

        return response()->json(['message' => 'Department data added successfully'], 201);
    }
}
