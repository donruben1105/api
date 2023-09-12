<?php

namespace App\Http\Controllers\Api\V1\Employer;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Registered;

class EmployerController extends Controller
{
    private $employerServiceUrl;

    public function __construct()
    {
        // Set the URL of the employer microservice
        $this->employerServiceUrl = 'http://localhost:9000'; // Replace with the actual URL of the employer microservice
    }

    public function index()
    {
        // Implement logic to fetch all employers from the employer microservice
        $response = Http::get($this->employerServiceUrl . '/api/v1/employer/get/user');

        // Handle the response as needed
        $employers = $response->json();
        // dd($response->json());

        // Check if $employers is null or empty
        if (empty($employers)) {
            return response()->json(['message' => 'No employers found'], 200);
        }

        return $employers;
    }



    public function store(Request $request)
    {
        $request->validate([
            'display_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'headcount' => ['string', 'max:255'],
            'social' => ['string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        // Prepare the data to be sent to the employer microservice
        $data = [
            'display_name' => $request->display_name,
            'username' => $request->username,
            'email' => $request->email,
            'headcount' => $request->headcount,
            'social' => $request->social,
            'password' => $request->password,
        ];

        // Make a POST request to the employer microservice to create the employer
        $response = Http::post($this->employerServiceUrl . '/register', $data);

        // Check if the request was successful (status code 2xx indicates success)
        if ($response->status() >= 200 && $response->status() < 300) {
            // Get the created employer data from the response (if any)
            $createdEmployer = $response->json();

            return response()->json($createdEmployer, $response->status()); // Return the created employer data with the same status code
        } else {
            // Handle the case when the request was not successful (e.g., show an error message)
            return response()->json(['message' => 'Failed to create employer'], $response->status());
        }
    }


    public function update(Request $request, $id)
    {
        $authenticatedUserId = Auth::id();
        dd($authenticatedUserId); // Debugging line to check the authenticated user's ID


        if ($id != $request->user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $request->validate([
            'display_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'headcount' => ['string', 'max:255'],
            'social' => ['string', 'max:255'],
            'password' => Rules\Password::defaults(),
        ]);

        // Prepare the data to be sent to the employer microservice
        $data = [
            'display_name' => $request->display_name,
            'username' => $request->username,
            'email' => $request->email,
            'headcount' => $request->headcount,
            'social' => $request->social,
            'password' => $request->password,
        ];

        // Implement logic to update an employer in the employer microservice
        $response = Http::put($this->employerServiceUrl . '/get/user' . $id, $data); // Assuming update endpoint is /update/{id}

        if ($response->successful()) {
            // Get the updated employer data from the response
            $updatedEmployer = $response->json();

            return response()->json($updatedEmployer, $response->status()); // Return the updated employer data with the same status code
        } else {
            // Handle the case when the request was not successful (e.g., show an error message)
            return response()->json(['message' => 'Failed to update employer'], $response->status());
        }
    }

    public function destroy($id)
    {
        // Implement logic to delete an employer from the employer microservice
        $response = Http::delete($this->employerServiceUrl . '/api/employers/' . $id);

        // Handle the response as needed
        return $response->json();
    }
}
