<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Http\Requests\levels\StoreLevelRequest;
use App\Http\Requests\levels\UpdateLevelRequest;
use App\Http\Responses\ApiResponse;
use Exception;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $levels = Level::paginate($request->get('per_page', 10));
        return $levels;
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
    public function store(StoreLevelRequest $request)
    {
        //
        $level = Level::create($request->validated());
        try {
            return ApiResponse::success('Resource created successfully.', 201, $level);
        } catch (Exception $e) {
            return ApiResponse::error('Something went wrong.', 422, $level);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        //
        $level = Level::find($level);
        return ApiResponse::success('Resource found successfully.', 202, $level);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLevelRequest $request, Level $level)
    {
        //
        $level->update($request->validated());
        return ApiResponse::success('Resource updated successfully', 200, $level);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        //
        $level->delete();
        return ApiResponse::success('Resource deleted successfully', 200);
    }
}
