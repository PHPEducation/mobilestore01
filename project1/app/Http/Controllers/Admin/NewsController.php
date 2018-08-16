<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NewsFormRequest;
use App\News;
use App\Category;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    public function index ()
    {
        $news = News::all();

        return view('admin.news.index', compact('news') );
    }

    public function create ()
    {
        $catalogs = Category::whereNull('category_id')->get();

        return view('admin.news.create',compact('catalogs') );
    }

    public function store (NewsFormRequest $request)
    {
        News::createNews($request);

        return redirect()->back()->with('status', __('news.created'));
    }

    public function edit (NewsFormRequest $request, $id)
    {
        $catalogs = Category::whereNull('category_id')->get();
        $news = News::findOrFail($id);
        $category_i = $news->categories;
        $catalog_i = $category_i->catalog;
        $categories = Category::where('category_id', '=', $catalog_i->id)->get();

        return view('admin.news.edit', compact('news', 'catalogs', 'categories', 'catalog_i', 'category_i') );
    }

    public function update (NewsFormRequest $request,$id)
    {
        try {
            $news = News::updateNews($request, $id);

            return redirect()->back()->with('status', __('news.updated'));
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function delete ($id)
    {
        News::deleteNews($id);
        
        return redirect()->route('news');
    }
}
