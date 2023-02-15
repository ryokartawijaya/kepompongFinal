<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        if (Session::get('category') == 'student')
        {
            return view('forum.posts.categories', [
                "title" => 'Post Categories',
                "active" => 'categories',
                "categories" => Category::all()
            ]);
        }
        else
        {

            return view('forum.posts.teach-categories', [
                "title" => 'Post Categories',
                "active" => 'categories',
                "categories" => Category::all()
            ]);
        }
    }

    public function create()
    {
        return view('forum.posts.create-category');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ]);


        Category::create($validatedData);

        return redirect('/forum/categories')->with('success', 'Category has been added!');
    }

    public function delete()
    {
        $categories = Category::all();

        return view('forum.posts.delete-categories', compact('categories'));
    }


    public function destroy(Category $category)
    {

        Category::destroy($category->id);

        return redirect('/forum/categories')->with('success', 'Category has been deleted!');
    }


}
