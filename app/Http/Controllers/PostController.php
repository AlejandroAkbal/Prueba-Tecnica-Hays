<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {

        $postsResponse = Http::get('https://jsonplaceholder.typicode.com/posts');

        return view('posts.index', [
            'posts' => $postsResponse->collect()
        ]);
    }


    public function show(string $id)
    {
        //
    }
}
