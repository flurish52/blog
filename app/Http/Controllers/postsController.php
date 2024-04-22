<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\User;
use Illuminate\Http\Request;
use \App\Models\Posts;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class postsController extends Controller
{
    public function showPosts(Posts $posts)
    {
        return Inertia::render('Index', [
            'posts' => Posts::all(),
            $categories = categories::all(),
            'categories' => $categories,
        ]);
    }

    public function openPost(Posts $post, $id)
    {
        return Inertia::render('Show', [
            $post = Posts::find($id),
            'post' => $post
        ]);

    }

    public function edit(Posts $post, $id)
    {
        return Inertia::render('Edit', [
            $post = Posts::find($id),
            'post' => $post,

        ]);


    }

    public function update(Request $request, Posts $id)
    {
        $updatedPost = Posts::find($id);
        if ($updatedPost) {
            $updatedPost[0]->postTitle = $request->data['postTitle'];
            $updatedPost[0]->content = $request->data['content'];
            $updatedPost[0]->save();
            return $updatedPost;
        }
        return 'No not found with such ID';
    }

    public function destroy($id)
    {
        $toBeDeleted = Posts::find($id);
        $toBeDeleted->delete();
    }

    public function newPost(categories $categories)
    {
        return Inertia::render('NewPost', [
            $categories = categories::all(),
            'authors' => User::all(),
            'categories' => $categories,
        ]);
    }

    public function createPost(Request $request)
    {
        $newPost = new Posts();
        $newPost->postTitle = $request->data['title'];
        $newPost->content = $request->data['content'];
        $newPost->categories = $request->data['primaryCategory'];
        $newPost->tags = $request->data['tags'];
        $newPost->author = $request->data['author'];
        $newPost->save();

    }

    public function showByCategories($id)
    {
        $category = categories::find($id);
        $postToShow = DB::table('posts')->where('categories', '=', $category->categories)->get();
        return inertia::render('Index', [
            'posts' => $postToShow,
            $categories = categories::all(),
            'categories' => $categories
        ]);

    }
}
