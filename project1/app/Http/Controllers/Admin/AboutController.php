<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AboutFormRequest;
use App\About;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index ()
    {
        $abouts = About::all();

        return view('admin.abouts.index', compact('abouts'));
    }

    public function create ()
    {
        return view('admin.abouts.create');
    }

    public function store (AboutFormRequest $request)
    {
        About::createAbout($request);

        return redirect()->back()->with('status', __('key.created') );
    }

    public function edit ($id)
    {
        $about = About::findOrFail($id);

        return view('admin.abouts.edit', compact('about'));
    }
    public function update (AboutFormRequest $request, $id)
    {
        About::updateAbout($request, $id);

        return redirect()->back()->with('status', __('key.updated') );
    }
    public function delete ($id)
    {
        About::deleteAbout($id);

        return redirect()->route('abouts')->with('status', __('key.deleted') );
    }
}
