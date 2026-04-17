<?php

namespace App\Http\Controllers\Site;

use App\Models\Chef;
use App\Models\Meal;
use App\Mail\Contact;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $meals = Meal::all();
        $categories = Category::all();
        $mealsRecent = Meal::latest()->take(3)->get();
        return view('site.index', compact('services', 'meals', 'categories', 'mealsRecent'));
    }
    public function menu()
    {
        $meals = Meal::all();
        $categories = Category::all();
        return view('site.menu', compact('meals', 'categories'));
    }
    public function service()
    {
        $services = Service::all();
        $meals =  Meal::paginate(4);
        return view('site.service', compact('services', 'meals'));
    }
    public function blog()
    {
        $meals = Meal::paginate(6);
        return view('site.blog', compact('meals'));
    }
    public function about()
    {
        $chefs = Chef::all();
        return view('site.about', compact('chefs'));
    }

    public function blog_single()
    {

        return view('site.blog_single');
    }

    public function contact()
    {
        return view('site.contact');
    }
    public function contact_data(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'required|string|max:150',
            'msg'     => 'required|string|min:5',
        ]);

        $data = $request->except('_token');
        Mail::to('taifjamal08@gmail.com')->send(new Contact($data));
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
