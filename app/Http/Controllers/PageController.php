<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use Storage;

class PageController extends Controller
{
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('pages.page')->with('page', $page);
    }

    public function catalogs()
    {
        $page = Page::where('slug', 'catalogs')->firstOrFail();

        $files = Storage::files('catalogs');

        return view('pages.catalogs')->with(['page' => $page, 'files' => $files]);
    }

    public function contacts()
    {
        $page = Page::where('slug', 'contacts')->firstOrFail();

        return view('pages.contacts')->with('page', $page);
    }
}
