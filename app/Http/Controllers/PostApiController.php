<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class PostApiController extends Controller
{
    public function index(): JsonResponse
    {
        $postsResponse = Http::get('https://jsonplaceholder.typicode.com/posts');

        $postsResource = PostResource::collection($postsResponse->collect());

        return $postsResource->response();
    }

    public function store(PostStoreRequest $request): JsonResponse
    {
        $requestData = $request->validated();

        $postResponse = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'title' => $requestData['title'],
            'body' => $requestData['body'],
            'userId' => $requestData['user_id'],
        ]);

        $postResource = new PostResource($postResponse->collect());

        return $postResource->response()->setStatusCode(201);
    }

    public function show(int $id): JsonResponse
    {
        $postResponse = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id);

        $postResource = new PostResource($postResponse->collect());

        return $postResource->response();
    }
}
