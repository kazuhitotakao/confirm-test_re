<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {   
        $contact = Contact::with('category')->get();
        $categories = Category::all();
        return view('index', compact('contact', 'categories'));
    }
    public function confirm(ContactRequest $request)
    {
        // $contacts = $request->only(['first_name', 'email', 'tel', 'detail']);
        $contact = $request->all();
        // $contact = Contact::with('category')->get();
        // $categories = Category::all();
        // dd($contact);
        return view('confirm', compact('contact'));
    }
    public function store(Request $request)
    {
        $request->session()->put('category_id', $request->input('category_id'));
        if ($request->input('back') == 'back') {
            return redirect('/')
            ->withInput();
        }
        $request->session()->forget('category_id');
        // $contacts = $request->only(['first_name', 'email', 'tel', 'detail']);
        $contact = $request->all();
        // dd($contact);
        Contact::create($contact);
        return view('thanks');
    }
    public function search(Request $request)
    {
        $contacts = Contact::with('category')
        ->GenderSearch($request->gender)
        ->LastNameSearch($request->keyword)
        // ->FirstNameSearch($request->keyword)
        // ->CategorySearch($request->category_id)
        ->get();
        $categories = Category::all();
        // dd($request);
        // dd($contact);
        return view('admin', compact('contacts', 'categories'));
    }

    public function destroy(Request $request)
    {
        // dd($request);
        Contact::find($request->id)->delete();
        // $contacts = Contact::with('category')->get();
        // $categories = Category::all();
        // return view('admin', compact('contacts', 'categories'));
        return redirect('/admin');
    }
    public function update(Request $request)
    {
        $contact = $request->only(['email']);
        Contact::find($request->id)->update($contact);

        return redirect('/admin');
    }
}
