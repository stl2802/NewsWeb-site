<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index_json(){
        $path = public_path('articles.json');
        $articles = json_decode(file_get_contents($path));
        return view('index_json',['articles'=>$articles]);
    }
    public function index(){
        $articles = Article::paginate(12);
        return view('index',compact('articles'));
    }
    public function show(Article $article){
        $checkComments = $article->comments->where('admin_check_status', true);
        return view('show', compact('article','checkComments'));
    }

    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
}
