<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('habits')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create(array_merge($request->validated(), [
            'user_id' => auth()->id(),
        ]));

        return redirect()->route('categories.index')
            ->with('success', 'تم إضافة التصنيف بنجاح.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'تم تحديث التصنيف بنجاح.');
    }
    public function destroy(Category $category)
    {
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        if ($category->habits()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'لا يمكن حذف التصنيف لتعلقه بعادات موجودة.');
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'تم حذف التصنيف بنجاح.');
    }

    public function show(Category $category)
    {
        $category->load('habits');
        return view('categories.show', compact('category'));
    }
}
