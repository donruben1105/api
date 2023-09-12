<?php

namespace App\Http\Controllers\Api\V1\Freelancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Freelancer\EnglishLevel;

class EnglishLevelController extends Controller
{
    public function index()
    {
        $englishLevel = EnglishLevel::all();

        return response()->json($englishLevel);
    }

    public function show($id)
    {
        $englishLevel = EnglishLevel::findOrFail($id);
        return response()->json($englishLevel);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $formFields['user_id'] = auth()->id();

        $englishLevel = EnglishLevel::create($formFields);

        return response()->json($englishLevel, 201);
    }

    public function update(Request $request, EnglishLevel $englishLevel)
    {
        if ($englishLevel->user_id != $request->user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $englishLevel->update($formFields);

        return response()->json($englishLevel);
    }

    public function destroy(EnglishLevel $englishLevel)
    {
        $englishLevel->delete();

        return response()->json(null, 204);
    }
}
