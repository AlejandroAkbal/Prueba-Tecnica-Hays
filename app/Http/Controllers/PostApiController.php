<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use OpenApi\Annotations as OA;

class PostApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/posts",
     *     tags={"Posts"},
     *     summary="Get all posts",
     *     description="Get all posts",
     *     operationId="posts.index",
     *     @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/PostResource")
     *    )
     *   ),
     */
    public function index(): JsonResponse
    {
        $postsResponse = Http::get('https://jsonplaceholder.typicode.com/posts');

        $postsResource = PostResource::collection($postsResponse->collect());

        return $postsResource->response();
    }

    /**
     * @OA\Post(
     *     path="/api/posts",
     *     tags={"Posts"},
     *     summary="Create a post",
     *     description="Create a post",
     *     operationId="posts.store",
     *     @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/PostStoreRequest")
     *    ),
     *     @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/PostResource")
     *    ),
     *     @OA\Response(
     *     response=422,
     *     description="Validation Error",
     *     @OA\JsonContent(ref="#/components/schemas/ValidationErrorResponse")
     *    ),
     */
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

    /**
     * @OA\Get(
     *     path="/api/posts/{id}",
     *     tags={"Posts"},
     *     summary="Get a post",
     *     description="Get a post",
     *     operationId="posts.show",
     *     @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Post ID",
     *     required=true,
     *     @OA\Schema(
     *     type="integer",
     *     format="int64"
     *    )
     *   ),
     *     @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/PostResource")
     *    ),
     *     @OA\Response(
     *     response=404,
     *     description="Not Found",
     *     @OA\JsonContent(ref="#/components/schemas/NotFoundResponse")
     *    ),
     */
    public function show(int $id): JsonResponse
    {
        $postResponse = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id);

        if ($postResponse->status() === 404) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }

        $postResource = new PostResource($postResponse->collect());

        return $postResource->response();
    }
}
