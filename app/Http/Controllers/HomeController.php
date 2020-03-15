<?php

namespace App\Http\Controllers;

use App\Fact;
use App\Tag;
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
    public function index($tag = null)
    {
        return view('home')->with(compact('tag'));
    }
    
    public function add()
    {
        $tags = Tag::all();
        return view('add')->with(compact('tags'));
    }
    
    public function create(Request $request)
    {
        $f = new Fact();
        $f->question = $request->question;
        $f->answer = $request->answer;
        $f->supplementary = $request->supplement;
        $f->owner_id = $request->id;
        $f->save();
        $f->tags()->sync($request->tags);
    }
    
    public function facts($tag = null)
    {
        $facts = Fact::with('creator', 'tags')->tagged($tag)->get();
        return $facts;
    }
}
