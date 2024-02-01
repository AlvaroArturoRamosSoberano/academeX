<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\statuses\StoreStatusRequest;
use App\Http\Requests\statuses\UpdateStatusRequest;
use App\Http\Responses\ApiResponse;
use Exception;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $statuses = Status::paginate($request->get('per_page', 10));
        return $statuses;
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
    public function store(StoreStatusRequest $request)
    {
        //
        $status = Status::create($request->validated());
        try {
            return ApiResponse::success('Resource created successfully.', 201, $status);
        } catch (Exception $e) {
            return ApiResponse::error('Something went wrong.', 422, $status);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
        $status = Status::find($status);
        return ApiResponse::success('Resource found successfully.', 202, $status);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        //
        $status->update($request->validated());
        return ApiResponse::success('Resource updated successfully', 200, $status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        //
        $status->delete();
        return ApiResponse::success('Resource deleted successfully', 200);
    }
}
