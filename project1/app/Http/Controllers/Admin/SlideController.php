<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideFormRequest;
use App\Http\Controllers\Admin\UploadController;
use App\Image;

class SlideController extends Controller
{
    public function create ()
    {
        return view('admin.slides.create');
    }

    public function store (SlideFormRequest $request)
    {
        $file = $request->name;
        $imageable_type = 'App\Slide';
        $link = $request->get('link');
        UploadController::slidesUploadImages($file, $imageable_type, $link);

        return redirect()->back()->with('status', __('slide.created'));
    }

    public function index ()
    {
        $slides = Image::whereOfSlide(1)->paginate(config('custom.pagination.slides'));

        return view('admin.slides.index', compact('slides'));
    }

    public function delete($id)
    {
        $slide = Image::findOrFail($id);
        $slide->delete();

        return redirect()->back()->with('status', __('slide.deleted'));
    }
}
