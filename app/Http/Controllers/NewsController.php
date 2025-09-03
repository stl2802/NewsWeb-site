<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show_json($imageLabaName){
        return view('new', ['imageLabaName'=>$imageLabaName]);
    }
    public function show(Article $article){
        return view('show', compact('article'));
    }
}
