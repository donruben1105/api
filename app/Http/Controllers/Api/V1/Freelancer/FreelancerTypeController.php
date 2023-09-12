<?php

namespace App\Http\Controllers\Api\V1\Freelancer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Freelancer\FreelancerType;

class FreelancerTypeController extends Controller
{
    public function index()
    {
        $freelancerType = FreelancerType::all();

        return response()->json($freelancerType);
    }

    public function show($id)
    {
        $freelancerType = FreelancerType::findOrFail($id);
        return response()->json($freelancerType);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $formFields['user_id'] = auth()->id();

        $freelancerType = FreelancerType::create($formFields);

        return response()->json($freelancerType, 201);
    }

    public function update(Request $request, FreelancerType $freelancerType)
    {
        if ($freelancerType->user_id != $request->user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $freelancerType->update($formFields);

        return response()->json($freelancerType);
    }

    public function destroy(FreelancerType $freelancerType)
    {
        $freelancerType->delete();

        return response()->json(null, 204);
    }
}
