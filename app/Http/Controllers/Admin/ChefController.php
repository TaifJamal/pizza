<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chef;
use Illuminate\Http\Request;
use App\Http\Requests\ChefRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateChefRequest;

class ChefController extends Controller
{

    public function index()
    {
        $chefs = Chef::paginate(10);
        return view('dashboard.chefs.index', compact('chefs'));
    }

    public function create()
    {
        return view('dashboard.chefs.create');
    }


    public function store(ChefRequest $request)
    {
        // رفع الصورة
        $img = $request->file('image');
        $img_name = rand() . time() . $img->getClientOriginalName();
        $img->move(public_path('uploads/chefs'), $img_name);

        Chef::create([
            'name' => $request->name,
            'image' => $img_name,
            'job' => $request->job,
            'content' => $request->content,
        ]);
        return redirect()->route('admin.chefs.index')->with('success', 'Chef added successfully.');
    }


    public function edit(string $id)
    {
        $chef = Chef::findOrFail($id);
        return view('dashboard.chefs.edit', compact('chef'));
    }

    public function update(UpdateChefRequest $request, string $id)
    {
        $chef = Chef::findOrFail($id);

        $img_name = $chef->image;
        if ($request->hasFile('image')) {
            File::delete(public_path('uploads/chefs/' . $chef->image));
            $img = $request->file('image');
            $img_name = rand() . time() . $img->getClientOriginalName();
            $img->move(public_path('uploads/chefs'), $img_name);
        }

        $chef->update([
            'name' => $request->name,
            'image' => $img_name,
            'job' => $request->job,
            'content' => $request->content,
        ]);
        return redirect()->route('admin.chefs.index')->with('success', 'Chef updated successfully.');
    }


    public function destroy(string $id)
    {
        $chef = Chef::findOrFail($id);

        File::delete(public_path('uploads/chefs/' . $chef->image));

        $chef->delete();

        return redirect()->route('admin.chefs.index')->with('success', 'Chef deleted successfully.');
    }
}
