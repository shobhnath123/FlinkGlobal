<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Post access|Post create|Post edit|Post delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Post create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Post edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Post delete', ['only' => ['destroy', 'bulkDelete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::user()->hasRole('superadmin')) {
        //     $Post = Post::paginate(10);
        // } else {
        //     $Post = Post::where('user_id', Auth::user()->id)->paginate(4);
        // }
        $user = Auth::user();
        if ($user->hasRole(['superadmin', 'admin'])) {
        // Admin & Superadmin → ALL posts
        $Post = Post::with('users')->paginate(10);
    } else {
        // Normal user → only assigned posts
        $Post = Post::whereHas('users', function ($q) use ($user) {
            $q->where('users.id', $user->id);
        })->paginate(10);
    }

        return view('post.index',['posts'=>$Post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'website_password' => 'required|string|min:6',
            'rpassword' => 'required|same:website_password',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'user_ids' => 'nullable|array',
            'user_ids.*' => 'exists:users,id',
            'publish' => 'required|boolean',
        ]);

        $data = $request->all();

        // Handle user assignment
        if (Auth::user()->hasRole('superadmin') && $request->filled('user_id')) {
            $user = User::find($request->user_id);
            if ($user) {
                $data['user_id'] = $user->id;
                $data['username'] = $user->name;
            } else {
                $data['user_id'] = Auth::user()->id;
                $data['username'] = Auth::user()->name;
            }
        } else {
            $data['user_id'] = Auth::user()->id;
            $data['username'] = Auth::user()->name;
        }

        // Encrypt the password for security
        if (isset($data['website_password'])) {
            $data['website_password'] = encrypt($data['website_password']);
        }

        $Post = Post::create($data);

        if (Auth::user()->hasRole('superadmin') && $request->filled('user_ids')) {
            $Post->users()->sync($request->user_ids); // sync avoids duplicates
        } else {
            // Assign creator to the post in pivot table too
            $Post->users()->sync([Auth::id()]);
        }
        return redirect()->route('admin.posts.index')->withSuccess('Post created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Check if user owns the post or is superadmin
        if (!Auth::user()->hasRole('superadmin') && $post->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        return view('post.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Check if user owns the post or is superadmin
        if (!Auth::user()->hasRole('superadmin') && $post->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        $data = $request->all();

        // Handle user assignment for superadmin
        if (Auth::user()->hasRole('superadmin') && isset($data['user_id'])) {
            $data['user_id'] = $data['user_id'];
        } else {
            $data['user_id'] = Auth::user()->id;
        }

        // Encrypt the password for security if it's being updated
        if (isset($data['website_password'])) {
            $data['website_password'] = encrypt($data['website_password']);
        }

        $post->update($data);

        if (Auth::user()->hasRole('superadmin')) {
            $userIds = $request->filled('user_ids') ? $request->user_ids : [$post->user_id];
            $post->users()->sync($userIds);
        }
        return redirect()->route('admin.posts.index')->withSuccess('Post updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Check if user owns the post or is superadmin
        if (!Auth::user()->hasRole('superadmin') && $post->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        $post->delete();
        return redirect()->route('admin.posts.index')->withSuccess('Post deleted !!!');
    }

    /**
     * Bulk delete posts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'post_ids' => 'required|array',
            'post_ids.*' => 'integer|exists:posts,id'
        ]);

        $postIds = $request->post_ids;
        $deletedCount = 0;

        foreach ($postIds as $postId) {
            $post = Post::find($postId);

            if ($post) {
                // Check if user owns the post or is superadmin
                if (Auth::user()->hasRole('superadmin') || $post->user_id === Auth::user()->id) {
                    $post->delete();
                    $deletedCount++;
                }
            }
        }

        return redirect()->route('admin.posts.index')->withSuccess("{$deletedCount} post(s) deleted successfully!");
    }
}
