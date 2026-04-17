<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceRescource;
use App\Http\Requests\Api\ServiceUpdateRequest;


class ServiceController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        try {
            $services = Service::paginate(10);
            return $this->returnData('Services', ServiceRescource::collection($services), 'Services retrieved successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function create(ServiceRequest $request)
    {
        try {
            $service = Service::create([
                'icon' => $request->icon,
                'name' => $request->name,
                'description' => $request->description,
            ]);
            return $this->returnSuccessMessage('Service Created successfully', new ServiceRescource($service));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function update(ServiceUpdateRequest $request, Service $service)
    {
        try {
            $validated_data = $request->validated();
            $service->update($validated_data);
            return $this->returnSuccessMessage(' Service Updated successfully', new ServiceRescource($service));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function destroy(Service $service)
    {
        try {
            $service->delete();
            return $this->returnSuccessMessage('Service Deleted');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
