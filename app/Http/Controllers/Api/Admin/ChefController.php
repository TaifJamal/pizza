<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Chef;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\ChefRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\ChefRescource;
use App\Http\Requests\Api\ChefUpdateRequest;

class ChefController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        try {
            $chefs = Chef::paginate(10);
            return $this->returnData('Chefs', ChefRescource::collection($chefs), 'Chefs retrieved successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function create(ChefRequest $request)
    {
        try {
            $img = $request->file('image');
            $img_name = rand() . time() . $img->getClientOriginalName();
            $img->move(public_path('uploads/chefs'), $img_name);

            $chef = Chef::create([
                'image' => $img_name,
                'name' => $request->name,
                'job' => $request->job,
                'content' => $request->content,
            ]);
            return $this->returnSuccessMessage('Chef Created successfully', new ChefRescource($chef));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

   public function update(ChefUpdateRequest $request, Chef $chef)
    {
        try {

            $img_name = $chef->image;
            $validated_data = $request->validated();
            $chef->update($validated_data);


            if ($request->file('image')) {

                File::delete(public_path('uploads/chefs/' . $img_name));
                $img = $request->file('image');
                $img_name = rand() . time() . $img->getClientOriginalName();
                $img->move(public_path('uploads/chefs'), $img_name);

                $chef->update([
                    'image' => $img_name,
                ]);
            }

            return $this->returnSuccessMessage('Chef Updated successfully', new ChefRescource($chef));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function destroy(Chef $chef)
    {
        try {
            if ($chef->image) {
                File::delete(public_path('uploads/chefs/' . $chef->image));
            }
            $chef->delete();
            return $this->returnSuccessMessage('Chef Deleted');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
