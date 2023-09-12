<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Freelancer\SkillController;
use App\Http\Controllers\Api\V1\Employer\EmployerController;
use App\Http\Controllers\Api\V1\Employer\LocationController;
use App\Http\Controllers\Api\V1\Employer\HeadCountController;
use App\Http\Controllers\Api\V1\Employer\DepartmentController;
use App\Http\Controllers\Api\V1\Freelancer\LanguageController;
use App\Http\Controllers\Api\V1\Freelancer\SkillDataController;
use App\Http\Controllers\Api\V1\Employer\LocationDataController;
use App\Http\Controllers\Api\V1\Employer\HeadCountDataController;
use App\Http\Controllers\Api\V1\Employer\DepartmentDataController;
use App\Http\Controllers\Api\V1\Freelancer\EnglishLevelController;
use App\Http\Controllers\Api\V1\Freelancer\LanguageDataController;
use App\Http\Controllers\Api\V1\Freelancer\FreelancerTypeController;
use App\Http\Controllers\Api\V1\Freelancer\EnglishLevelDataController;
use App\Http\Controllers\Api\V1\Freelancer\FreelancerTypeDataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1/admin')->group(function () {
    Route::apiResource('/location', LocationController::class);
    Route::apiResource('/location/data', LocationDataController::class);
});

Route::prefix('v1/admin/employer')->group(function () {
    Route::get('/get/employer', [EmployerController::class, 'index']);
    Route::post('/store/employer', [EmployerController::class, 'store']);
    Route::put('/update/employer/{id}', [EmployerController::class, 'update']);
    Route::apiResource('/department', DepartmentController::class);
    Route::apiResource('/department/data', DepartmentDataController::class);
    Route::apiResource('/headcount', HeadCountController::class);
    Route::apiResource('/headcount/data', HeadCountDataController::class);
});

Route::prefix('v1/admin/freelancer')->group(function () {
    Route::apiResource('/english/level', EnglishLevelController::class);
    Route::apiResource('/english/level/data', EnglishLevelDataController::class);
    Route::apiResource('/skill', SkillController::class);
    Route::apiResource('/skill/data', SkillDataController::class);
    Route::apiResource('/freelancer/type', FreelancerTypeController::class);
    Route::apiResource('/freelancer/type/data', FreelancerTypeDataController::class);
    Route::apiResource('/language', LanguageController::class);
    Route::apiResource('/language/data', LanguageDataController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
