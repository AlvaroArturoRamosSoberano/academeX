<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\categories\StoreCategoryRequest;
use App\Http\Requests\categories\UpdateCategoryRequest;
use App\Http\Responses\ApiResponse;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $categories = Category::paginate($request->get('per_page', 10));
        return $categories;
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
    public function store(StoreCategoryRequest $request)
    {
        //
        $category = Category::create($request->validated());
        try {
            return ApiResponse::success('Resource created successfully.', 201, $category);
        } catch (Exception $e) {
            return ApiResponse::error('Something went wrong.', 422, $category);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        $category = Category::find($category);
        return ApiResponse::success('Resource found successfully.', 202, $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $category->update($request->validated());
        return ApiResponse::success('Resource updated successfully', 200, $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return ApiResponse::success('Resource deleted successfully', 200);
    }
}
