<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Skill;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $skills = Skill::orderBy('category_id')->get();

        return view('index')
            ->with([
                'categories' => $categories,
                'skills' => $skills,
            ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()
            ->route('index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit')
            ->with(['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();

        return redirect()
            ->route('index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('index');
    }
}
