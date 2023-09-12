<?php

namespace App\Http\Controllers\Api\V1\Freelancer;

use Illuminate\Http\Request;
use App\Models\Freelancer\Language;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function index()
    {
        $language = Language::all();

        return response()->json($language);
    }

    public function show($id)
    {
        $language = Language::findOrFail($id);
        return response()->json($language);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $formFields['user_id'] = auth()->id();

        $language = Language::create($formFields);

        return response()->json($language, 201);
    }

    public function update(Request $request, Language $language)
    {
        if ($language->user_id != $request->user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $language->update($formFields);

        return response()->json($language);
    }

    public function destroy(Language $language)
    {
        $language->delete();

        return response()->json(null, 204);
    }
}
