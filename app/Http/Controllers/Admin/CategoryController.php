<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryCreateRequest;

//　管理者がカテゴリー閲覧、作成、編集,削除
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(config('settings.paginate.categories'));
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryCreateRequest $request)
    {
        $category = new Category();
        $category->fill($request->all())->save();
        return redirect('admin/category')->with('success', '作成しました');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(CategoryCreateRequest $request, Category $category)
    {
        $category->fill($request->all())->save();
        return redirect('/admin/category')->with('success', '更新しました');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/admin/category')->with('success', '削除しました!');
    }
}
