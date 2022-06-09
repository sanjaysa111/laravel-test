<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlog()
    {
        $blogs = Blog::query()
                    ->select(['id', 'title', 'description', 'created_at', 'updated_at'])
                    ->where('user_id', auth()->id())
                    ->paginate(10);

        // $user = User::findOrFail(auth()->id());
        // $blogs = $user->blogs;
        
        return view('blog.list', compact('blogs'));
    }
}
