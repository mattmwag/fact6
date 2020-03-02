<?php

namespace App\Http\Controllers;

use App\Fact;
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
    
    public function add()
    {
        return view('add');
    }
    
    public function create(Request $request)
    {
        $f = new Fact();
        $f->question = $request->question;
        $f->answer = $request->answer;
        $f->supplementary = $request->supplement;
        $f->owner_id = $request->id;
        $f->save();
    }
    
    public function facts()
    {
        $facts = Fact::with('creator')->get();
        return $facts;
    }
}
