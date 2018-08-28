<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatalogFormRequest;
use App\Category;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
    public function index ()
    {
        $catalogs = Category::whereNull('category_id')->paginate(config('custom.pagination.catalogs_table'));

        return view('admin.catalogs.index', compact('catalogs'));
    }

    public function create ()
    {
        return view('admin.catalogs.create');
    }

    public function store (CatalogFormRequest $request)
    {
        Category::create([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
        ]);

        return redirect()->back()->with('status', __('catalog.created') );
    }

    public function edit ($slug)
    {
        $catalog = Category::whereSlug($slug)->firstOrFail();

        return view('admin.catalogs.edit', compact('catalog'));
    }

    public function update (CatalogFormRequest $request, $slug)
    {
        $catalog = Category::whereSlug($slug)->firstOrFail();
        $catalog->name = $request->get('name');
        $catalog->slug = Str::slug($request->get('name'));
        $catalog->save();

        return redirect()->route('edit-catalogs', ['slug' => $catalog->slug])->with('status', __('catalog.updated') );
    }

    public function delete ($id)
    {
        $catalog = Category::whereId($id)->firstOrFail();
        $catalog->delete();

       return redirect()->route('catalogs');
    }

    public function categories (Request $request, $slug)
    {
        $catalog = Category::whereSlug($slug)->firstOrFail();
        $categories = $catalog->categories;
        if($request->ajax()) {
            return response()->json($categories);
        }
        
        return view('admin.catalogs.categories', compact('categories', 'catalog'));
    }
}
