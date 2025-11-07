<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    private const ARTICLE_VALIDATOR = [
        'title'=>'nullable|string',
        'shortDesc'=>'required|string',
        'desc'=>'nullable|string',
        'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:10240'],
    ];
    public function __construct(){
        $this->middleware('auth');
    }
    public function show_json($imageLabaName){
        return view('new', ['imageLabaName'=>$imageLabaName]);
    }
    public function create(){
        return view('article.create');
    }
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
    }
    public function store(Request $request){
        $validated = $request->validate(self::ARTICLE_VALIDATOR);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles','public');
        }


        $date = date('Y-m-d');
        Auth::user()->articles()->create([
            'title'=>$validated['title'],
            'shortDesc'=>$validated['shortDesc'],
            'desc'=>$validated['desc'],
            'datePublic'=>$date,
            'image'=>$imagePath,
            'user_id'=>Auth::id(),
        ]);
        return redirect()->route('home');
    }
    public function update(Request $request, Article $article){
        $validated = $request->validate(self::ARTICLE_VALIDATOR);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles','public');
        }

        $article->update([
            'title'=>$validated['title'],
            'shortDesc'=>$validated['shortDesc'],
            'desc'=>$validated['desc'],
            'image'=>$imagePath,
            'datePublic'=>date('Y-m-d'),
        ]);
        return redirect()->route('show',$article->id);
    }
    public function delete(Article $article){
        $article->delete();
        return redirect()->back();
    }
    public function show(Article $article){
        return view('show', compact('article'));
    }
}
