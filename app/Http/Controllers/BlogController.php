<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $blogs = Blog::with('categories')->get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::get();
//        dd($categories);
        return view('blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'categories_id' => ['required', 'array', 'min:1'],
            'categories_id.*' => ['required', 'integer', 'exists:categories,id'],
        ]);
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        foreach ($request->input('categories_id', []) as $key => $value) {
            $blog->categories()->attach($value);
        }

        $blog->save();
        return view('blogs.index')->with('success', 'Blog created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function edit(Blog $blog)
    {

        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'categories_id' => ['required', 'array', 'min:1'],
            'categories_id.*' => ['required', 'integer', 'exists:categories,id'],
        ]);

        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        foreach ($request->categories as $value) {
            $blog->categories()->sync($value);
        }

        $blog->save();

        return view('blogs.index')->with('success','Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function destroy(Blog $blog)
    {
        $blog->categories()->detach();
        $blog->delete();
        return view('blogs.index');
    }
}
