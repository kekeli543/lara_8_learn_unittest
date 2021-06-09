<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase; //每次執行時都要重整資料庫

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    //測試是否正確的建立5筆資料
    public function test_posts_count()
    {
        Post::factory()->count(5)->create(); //生成五筆假資料

        $posts = Post::get();

        $this->assertCount(5,$posts); //確認資料筆數
    }

    //測試 /posts 路徑能否正常訪問
    public function test_index_get()
    {
        Post::factory()->count(5)->create(); //生成五筆假資料

        $response = $this->get('/posts');

        $response->assertStatus(200); //確認狀態碼
    }

    //測試 /posts 路徑能否看到指定的標題
    public function test_index_see()
    {
        Post::factory()->count(5)->create(); //生成五筆假資料

        $response = $this->get('/posts');

        $post = Post::first();

        $response->assertSee($post->title);
    }

    //測試 /posts/{id} 路徑能否正常用get訪問
    public function test_show_get()
    {
        Post::factory()->count(5)->create(); //生成五筆假資料

        $post = Post::first();

        $response = $this->get("/posts/{$post->id}");

        $response->assertStatus(200);
    }

    //測試 /posts/{id} 路徑能否正常用post訪問
    public function test_show_post()
    {
        Post::factory()->count(5)->create(); //生成五筆假資料

        $post = Post::first();

        $response = $this->post("/posts/{$post->id}");

        $response->assertStatus(200);
    }

     //測試 /posts/store 路徑能否正常用來新增資料
    public function test_store_post()
    {
        $post = Post::factory()->make();
        $response = $this->post('/posts/store',['title'=>$post['title'],'content'=>$post['content'] ]);
        $response->assertStatus(201);
    }

}
