<?php

namespace App\Http\Controllers;

use App\Models\Ennrollment;
use App\Http\Requests\ennrollments\StoreEnnrollmentRequest;
use App\Http\Requests\ennrollments\UpdateEnnrollmentRequest;
use App\Http\Responses\ApiResponse;
use Exception;
use Illuminate\Http\Request;

class EnnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $ennrollments = Ennrollment::paginate($request->get('per_page', 10));
        return $ennrollments;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnnrollmentRequest $request)
    {
        //
        $ennrollment = Ennrollment::create($request->validated());
        try {
            return ApiResponse::success('Resource created successfully.', 201, $ennrollment);
        } catch (Exception $e) {
            return ApiResponse::error('Something went wrong.', 422, $ennrollment);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ennrollment $ennrollment)
    {
        //
        $ennrollment = Ennrollment::find($ennrollment);
        return ApiResponse::success('Resource found successfully.', 202, $ennrollment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ennrollment $ennrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnnrollmentRequest $request, Ennrollment $ennrollment)
    {
        //
        $ennrollment->update($request->validated());
        return ApiResponse::success('Resource updated successfully', 200, $ennrollment);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ennrollment $ennrollment)
    {
        //
        $ennrollment->delete();
        return ApiResponse::success('Resource deleted successfully', 200);
    }
}
