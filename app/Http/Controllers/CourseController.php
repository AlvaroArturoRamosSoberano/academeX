<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\courses\StoreCourseRequest;
use App\Http\Requests\courses\UpdateCourseRequest;
use App\Http\Responses\ApiResponse;
use Exception;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $courses = Course::paginate($request->get('per_page', 10));
        return $courses;
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
    public function store(StoreCourseRequest $request)
    {
        //
        $courses = Course::create($request->validated());
        try {
            return ApiResponse::success('Resource created successfully.', 201, $courses);
        } catch (Exception $e) {
            return ApiResponse::error('Something went wrong.', 422, $courses);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
        $course = Course::find($course);
        return ApiResponse::success('Resource found successfully.', 202, $course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
        $course->update($request->validated());
        return ApiResponse::success('Resource updated successfully', 200, $course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();
        return ApiResponse::success('Resource deleted successfully', 200);
    }
}
