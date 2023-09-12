<?php

namespace App\Http\Controllers\Api\V1\Freelancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Freelancer\SkillData;

class SkillDataController extends Controller
{
    public function index()
    {
        $skillData = SkillData::all();
        return response()->json($skillData);
    }

    public function show($id)
    {
        $skillData = SkillData::findOrFail($id);
        return response()->json($skillData);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'skill' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        // Create a new skillData entry
        SkillData::create([
            'skill' => $request->input('skill'),

        ]);

        return response()->json(['message' => 'Skill data added successfully'], 201);
    }
}
