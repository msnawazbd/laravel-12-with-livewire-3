<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function counter()
    {
        return view('counter');
    }

    public function product()
    {
        return view('product');
    }

    public function products()
    {
        return view('products');
    }

    public function photo_upload()
    {
        return view('photo_upload');
    }

    public function user()
    {
        return view('user');
    }

    public function users()
    {
        return view('users');
    }

    public function users_table()
    {
        return view('users-table');
    }

    public function address()
    {
        return view('address');
    }

    public function invoice()
    {
        return view('invoice');
    }

    public function posts()
    {
        return view('posts');
    }

    public function review()
    {
        return view('review');
    }

    public function post()
    {
        return view('post');
    }

    public function calendar()
    {
        return view('calendar');
    }

    public function drag_and_drop()
    {
        return view('drag_and_drop');
    }

    public function form_component()
    {
        return view('form-component');
    }

    public function student()
    {
        return view('student');
    }

    public function show($id)
    {
        return User::query()->findOrFail($id);
    }
}
