<?php

namespace App\Http\Controllers\Api\V1\Employer;

use Illuminate\Http\Request;
use App\Models\Employer\HeadCount;
use App\Http\Controllers\Controller;

class HeadCountController extends Controller
{
    public function index()
    {
        $headcount = HeadCount::all();

        return response()->json($headcount);
    }

    public function show($id)
    {
        $headcount = HeadCount::findOrFail($id);
        return response()->json($headcount);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $formFields['user_id'] = auth()->id();

        $headcount = HeadCount::create($formFields);

        return response()->json($headcount, 201);
    }

    public function update(Request $request, HeadCount $headcount)
    {
        if ($headcount->user_id != $request->user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $headcount->update($formFields);

        return response()->json($headcount);
    }

    public function destroy(HeadCount $headcount)
    {
        $headcount->delete();

        return response()->json(null, 204);
    }
}
