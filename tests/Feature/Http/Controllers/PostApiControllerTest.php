<?php

test('api.posts.index is successful', function () {
    $response = $this->get('/api/posts');

    $response->assertStatus(200);

    $response->assertJsonCount(100, 'data');

    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'user_id',
                'title',
                'body',
            ],
        ],
    ]);
});

test('api.posts.show is successful', function () {
    $response = $this->get('/api/posts/1');

    $response->assertStatus(200);

    $response->assertJsonStructure([
        'data' => [
            'id',
            'user_id',
            'title',
            'body',
        ],
    ]);

    $response->assertJson([
        'data' => [
            'id' => 1,
            'user_id' => 1,
            'title' => 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit',
            'body' => "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto",
        ],
    ]);
});

test('api.posts.store is successful', function () {
    $response = $this->post('/api/posts', [
        'title' => 'Test Title',
        'body' => 'Test Body',
        'user_id' => 1,
    ]);

    $response->assertStatus(201);

    $response->assertJsonStructure([
        'data' => [
            'id',
            'user_id',
            'title',
            'body',
        ],
    ]);

    $response->assertJson([
        'data' => [
            'title' => 'Test Title',
            'body' => 'Test Body',
            'user_id' => 1,
        ],
    ]);
});
