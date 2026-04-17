<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryRescource;
use App\Http\Requests\Api\CategoryUpdateRequest;


class CategoryController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        try {
            $categories = Category::paginate(10);
            return $this->returnData('Categories', CategoryRescource::collection($categories), 'Categories retrieved successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function create(CategoryRequest $request)
    {
        try {
            $category = Category::create([
                'name' => $request->name,
            ]);
            return $this->returnSuccessMessage('Category Created successfully', new CategoryRescource($category));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $validated_data = $request->validated();
            $category->update($validated_data);
            return $this->returnSuccessMessage(' Category Updated successfully', new CategoryRescource($category));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return $this->returnSuccessMessage('Category Deleted');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
