<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::paginate(10);
        return view('dashboard.services.index', compact('services'));
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(ServiceRequest $request)
    {
        Service::create([
            'icon' => $request->icon,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.services.index')->with('success', 'Server added successfully');
    }

    public function edit(string $id)
    {
        $service = Service::findorfail($id);
        return view('dashboard.services.edit', compact('service'));
    }


    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::findorfail($id);
        $service->update([
            'icon' => $request->icon,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.services.index')->with('success', 'Server updated successfully');
    }


    public function destroy(string $id)
    {
        $service = Service::findorfail($id);
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Server deleted successfully');
    }
}
