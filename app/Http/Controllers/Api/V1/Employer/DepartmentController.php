<?php

namespace App\Http\Controllers\Api\V1\Employer;

use Illuminate\Http\Request;
use App\Models\Employer\Department;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();

        return response()->json($department);
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return response()->json($department);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $formFields['user_id'] = auth()->id();

        $department = Department::create($formFields);

        return response()->json($department, 201);
    }

    public function update(Request $request, Department $department)
    {
        if ($department->user_id != $request->user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'string',
            'slug' => 'string',
            'description' => 'string'
        ]);

        $department->update($formFields);

        return response()->json($department);
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return response()->json(null, 204);
    }
}
