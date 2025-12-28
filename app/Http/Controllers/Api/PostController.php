<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('publish', true)->get(['id', 'title', 'url', 'website_password', 'username', 'created_at', 'updated_at']);

        $posts->transform(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'url' => $post->url,
                'password' => $post->decrypted_password,
                'username' => $post->username,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ];
        });

        return response()->json($posts);
    }

    public function show($id)
    {
        $post = Post::where('publish', true)->findOrFail($id);

        return response()->json([
            'id' => $post->id,
            'title' => $post->title,
            'url' => $post->url,
            'password' => $post->decrypted_password,
            'username' => $post->username,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'website_password' => 'required|string',
            'description' => 'required|string',
            'publish' => 'boolean',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'url' => $request->url,
            'website_password' => encrypt($request->website_password),
            'description' => $request->description,
            'user_id' => Auth::id(),
            'username' => Auth::user()->name,
            'publish' => $request->publish ?? false,
        ]);

        return response()->json([
            'message' => 'Post created successfully',
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'url' => $post->url,
                'password' => $post->decrypted_password,
                'username' => $post->username,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ]
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Check if user owns the post or has permission
        if ($post->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'url' => 'sometimes|required|url',
            'website_password' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'publish' => 'boolean',
        ]);

        $updateData = [];
        if ($request->has('title')) $updateData['title'] = $request->title;
        if ($request->has('url')) $updateData['url'] = $request->url;
        if ($request->has('website_password')) $updateData['website_password'] = encrypt($request->website_password);
        if ($request->has('description')) $updateData['description'] = $request->description;
        if ($request->has('publish')) $updateData['publish'] = $request->publish;

        $post->update($updateData);

        return response()->json([
            'message' => 'Post updated successfully',
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'url' => $post->url,
                'password' => $post->decrypted_password,
                'username' => $post->username,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ]
        ]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}