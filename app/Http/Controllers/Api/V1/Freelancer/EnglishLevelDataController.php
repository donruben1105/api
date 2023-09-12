<?php

namespace App\Http\Controllers\Api\V1\Freelancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Freelancer\EnglishLevelData;

class EnglishLevelDataController extends Controller
{
    public function index()
    {
        $englishLevelData = EnglishLevelData::all();
        return response()->json($englishLevelData);
    }

    public function show($id)
    {
        $englishLevelData = EnglishLevelData::findOrFail($id);
        return response()->json($englishLevelData);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'englishLevel' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        // Create a new englishLevelData entry
        EnglishLevelData::create([
            'englishLevel' => $request->input('englishLevel'),

        ]);

        return response()->json(['message' => 'English Level data added successfully'], 201);
    }
}
