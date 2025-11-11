<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function articles(){
        $articles = Article::all();
        return view('admin.articles',compact('articles'));
    }
    public function comments(){
        $comments = Comment::all();
        $unCheckComments = $comments->where('admin_check_status', false);
        return view('admin.comments',compact('unCheckComments'));
    }
    //доделать с помощью суперюзера
    public function deleteUser(){
        return redirect()->back();
    }
    public function banUser(){
        return redirect()->back();
    }
    public function unbanUser(){
        return redirect()->back();
    }
    //доделать с помощью суперюзера
    public function logs(){
        $filePath = storage_path('logs\laravel.log');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'laravel.log');
        } else {
            return response()->json(['error' => 'Лог-файл не найден'], 404);
        }
    }
}
