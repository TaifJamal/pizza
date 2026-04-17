<?php

namespace App\Http\Controllers\Api\Site;

use App\Models\Meal;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\MealRescource;
use App\Http\Resources\ServiceRescource;
use App\Http\Resources\CategoryRescource;

class SiteController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        try {
            $services = ServiceRescource::collection(Service::all());
            $meals = MealRescource::collection(Meal::all());
            $categories =CategoryRescource::collection(Category::all());
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
