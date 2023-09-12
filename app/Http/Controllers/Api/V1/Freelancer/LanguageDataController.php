<?php

namespace App\Http\Controllers\Api\V1\Freelancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Freelancer\LanguageData;

class LanguageDataController extends Controller
{
    public function index()
    {
        $languageData = LanguageData::all();
        return response()->json($languageData);
    }

    public function show($id)
    {
        $languageData = LanguageData::findOrFail($id);
        return response()->json($languageData);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'language' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        // Create a new LanguageData entry
        LanguageData::create([
            'language' => $request->input('language'),

        ]);

        return response()->json(['message' => 'Language data added successfully'], 201);
    }
}
