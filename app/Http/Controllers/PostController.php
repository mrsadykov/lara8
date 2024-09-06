<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        //dd($posts);
        return view('post.index', compact('posts'));

        //dd($post->tags);

        //$tag = Tag::find(1);
        //dd($tag->posts);

        //$categories = Category::all();
        //$category = Category::find(2);

        //$posts = Post::where('category_id', $category->id)->get();

        //dd($post->category);
        //dd($category->posts);

        //dd($posts);
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        //dd($categories);
        return view('post.create', compact('categories', 'tags'));
        /*$postsArr = [
            [
                'title' => 'fourth title ',
                'content' => 'some content ...',
                'image' => '/images/1.png',
                'likes' => 3,
                'is_published' => 1,
            ],
            [
                'title' => 'fifth title ',
                'content' => 'some content ...',
                'image' => '/images/5.png',
                'likes' => 12,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $post) {
            Post::create($post);
        }*/
    }

    public function store() {
        $data = request()->validate([
            'title'         => 'required|string',
            'content'       => 'required|string',
            'image'         => 'string',
            'category_id'   => 'required|integer',
            'tags'          => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        //dd($data, $tags);

        $post = Post::create($data);
        /*if (!empty($tags)) {
            foreach ($tags as $tag) {
                PostTag::firstOrCreate([
                    'post_id'   => $post->id,
                    'tag_id'    => $tag
                ]);
            }
        }*/

        /**
         *
         * tags(), () - значит запрос в базу
         * attach() - привязка
         *
         */
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post) {
        $data = request()->validate([
            'title'         => 'string',
            'content'       => 'string',
            'image'         => 'string',
            'category_id'   => '',
            'tags'          => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        //dd($tags, $data);

        $post->update($data);
        /**
         * sync - удаляет старые привязки(записи) и добавляет новые
         * upd: совпадающие оставляет, несовпадающие удаляет
         */
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate() {

    }

    public function updateOrCreate() {

    }
}
