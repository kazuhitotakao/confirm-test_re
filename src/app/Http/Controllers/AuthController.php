<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        $csvData = Contact::all();
        return view('admin', compact('contacts', 'categories','csvData'));
    }
    public function login()
    {
        return view('admin');
    }
    // public function register(RegisterRequest $request)
    // {
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     // Auth::login($user);
    //     // return redirect(RouteServiceProvider::HOME);
    //     return redirect('login');
    // }
}
