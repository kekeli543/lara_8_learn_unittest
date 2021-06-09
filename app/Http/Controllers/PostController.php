<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return json_encode($posts, JSON_UNESCAPED_UNICODE);
    }

    public function show(Request $request,$id){
        $post = Post::findOrFail($id);
        return json_encode($post, JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request){
        $data = ['title' => $request->title , 'content' => $request->content];

        return response()->noContent(Response::HTTP_CREATED); //回傳201狀態碼
    }

}
