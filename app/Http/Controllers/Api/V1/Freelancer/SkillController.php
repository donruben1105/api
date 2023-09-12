<?php

namespace App\Http\Controllers\Api\V1\Freelancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Freelancer\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skill = Skill::all();

        return response()->json($skill);
    }

    public function show($id)
    {
        $skill = Skill::findOrFail($id);
        return response()->json($skill);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $formFields['user_id'] = auth()->id();

        $skill = Skill::create($formFields);

        return response()->json($skill, 201);
    }

    public function update(Request $request, Skill $skill)
    {
        if ($skill->user_id != $request->user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $skill->update($formFields);

        return response()->json($skill);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return response()->json(null, 204);
    }
}
