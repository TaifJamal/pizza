<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\MealRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\MealRescource;
use App\Http\Requests\Api\MealUpdateRequest;

class MealController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        try {
            $meals = Meal::with('category')->paginate(10);
            return $this->returnData('Meals', MealRescource::collection($meals), 'Meals retrieved successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function create(MealRequest $request)
    {
        try {
            $img = $request->file('image');
            $img_name = rand() . time() . $img->getClientOriginalName();
            $img->move(public_path('uploads/meals'), $img_name);


            $meal = Meal::create([
                'image' => $img_name,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
            ]);
            return $this->returnSuccessMessage('Meal Created successfully', new MealRescource($meal));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function update(MealUpdateRequest $request, Meal $meal)
    {
        try {

            $img_name = $meal->image;
            $validated_data = $request->validated();
            $meal->update($validated_data);


            if ($request->file('image')) {

                File::delete(public_path('uploads/meals/' . $img_name));
                $img = $request->file('image');
                $img_name = rand() . time() . $img->getClientOriginalName();
                $img->move(public_path('uploads/meals'), $img_name);

                $meal->update([
                    'image' => $img_name,
                ]);
            }

            return $this->returnSuccessMessage('Meal Updated successfully', new MealRescource($meal));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function destroy(Meal $meal)
    {
        try {
            if ($meal->image) {
                File::delete(public_path('uploads/meals/' . $meal->image));
            }
            $meal->delete();
            return $this->returnSuccessMessage('Meal Deleted');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
