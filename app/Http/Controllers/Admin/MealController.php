<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\MealRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateMealRequest;

class MealController extends Controller
{

    public function index()
    {
        $meals = Meal::with('category')->paginate(10);
        return view('dashboard.meals.index', compact('meals'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('dashboard.meals.create', compact('categories'));
    }


    public function store(MealRequest $request)
    {
        // رفع الصورة
        $img = $request->file('image');
        $img_name = rand() . time() . $img->getClientOriginalName();
        $img->move(public_path('uploads/meals'), $img_name);

        Meal::create([
            'image' => $img_name,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('admin.meals.index')->with('success', 'Meal added successfully.');
    }

    public function edit(string $id)
    {
        $meal = Meal::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.meals.edit', compact('meal', 'categories'));
    }


    public function update(UpdateMealRequest $request, string $id)
    {
        $meal = Meal::findOrFail($id);

        $img_name = $meal->image;
        if ($request->hasFile('image')) {
            File::delete(public_path('uploads/meals/' . $meal->image));
            $img = $request->file('image');
            $img_name = rand() . time() . $img->getClientOriginalName();
            $img->move(public_path('uploads/meals'), $img_name);
        }

        $meal->update([
            'image' => $img_name,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('admin.meals.index')->with('success', 'Meal updated successfully.');
    }

    public function destroy(string $id)
    {
        $meal = Meal::findOrFail($id);
        // حذف الصورة عند حذف الوجبة
        File::delete(public_path('uploads/meals/' . $meal->image));

        $meal->delete();

        return redirect()->route('admin.meals.index')->with('success', 'Meal deleted successfully.');
    }
}
