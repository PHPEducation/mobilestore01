<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function index ()
    {
        $categories = Category::whereNotNull('category_id')->get();
        
        return view('admin.categories.index', compact('categories', 'catalog'));
    }

    public function create ()
    {
        $categories_parent = Category::whereNull('category_id')->get()->toArray();

        return view('admin.categories.create', compact('categories_parent'));
    }

    public function store (CategoryFormRequest $request)
    {
        if($request->get('catalog')) {
            Category::create([
                'name' => $request->get('name'),
                'slug' => Str::slug($request->get('name'), '-'),
                'category_id' => $request->get('catalog'),
            ]);
        } else {
            Category::create([
                'name' => $request->get('name'),
                'slug' => Str::slug($request->get('name'), '-')
            ]);
        }

        return redirect()->back()->with('status', __('category.created') );
    }

    public function edit ($id)
    {
        $category = Category::findOrFail($id);
        $categories_parent = Category::whereNull('category_id')->get();

        return view('admin.categories.edit', compact('category', 'categories_parent'));
    }

    public function update (CategoryFormRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->slug = Str::slug($request->get('name'), '-');
        if($request->get('catalog')) {
            $category->category_id = $request->get('catalog');
        }
        $category->save();

        return redirect()->back()->with('status', __('category.updated') );
    }

    public function delete ($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories')->with('status', __('category.deleted'));
    }
    public function products (Request $request, $slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        $products = $category->products;
        if($request->ajax()) {
            return response()->json($products);
        }
    }
}
