<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    function index()
    {
        $blogs = Blog::search(request(['search', 'category']))
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        $categories = Category::get();
        return view('index', compact('blogs', 'categories'));
    }

    function create()
    {
        return view('create');
    }

    function store(BlogRequest $request)
    {
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . $image->getClientOriginalName();
                $imageNames[] = $imageName;
                $image->storeAs('public/images', $imageName);
            }
        }

        $blogData = [
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $request->slug,
            'user_id' => $request->user_id,
            'category_id' => 10
        ];
        $blogData['images'] = $imageNames;

        Blog::create($blogData);

        return redirect()->route('index')->with('message', 'Blog Create Success');
    }

    function show(Blog $blog)
    {
        return view('show', compact('blog'));
    }

    function edit(Blog $blog)
    {
        return view('edit', compact('blog'));
    }

    function update(BlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());
        return redirect()->route('blog.index')->with('message', 'Blog Update Success');
    }

    function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('message', 'Blog Delete Success');
    }
}
