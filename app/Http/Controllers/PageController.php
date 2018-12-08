<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Storage;

use App\Page;
use App\Option;
use App\Product;
use App\Company;
use App\Category;

class PageController extends Controller
{
    public function index()
    {
    	$new_products = Product::where('status', 1)->orderBy('created_at', 'desc')->take(12)->get();
        $top_products = Product::where('status', 1)->where('mode', 1)->orderBy('updated_at', 'desc')->take(16)->get();

        return view('site.index', compact('new_products', 'top_products'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('site.page')->with('page', $page);
    }

    public function categoryProducts(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        // Option operations
        if ($request->ajax() AND isset($request->options_id)) {
            $request->session()->put('options', $request->options_id);
            $request->session()->put('category_id', $category->id);
        }

        if ($request->ajax() AND empty($request->action) AND empty($request->options_id) OR session('category_id') != $category->id) {
            $request->session()->forget('options');
        }

        if ($request->session()->has('options')) {

            $options_id = session('options');

            $products = Product::where('status', '<>', 0)->where('category_id', $category->id)
                ->whereHas('options', function ($query) use ($options_id) {
                    $query->whereIn('option_id', $options_id);
                })->paginate(27);
        }
        // else if ($request->ajax()) {
        //     $products = Product::where('status', 1)->where('category_id', $category->id)->paginate(27);
        //     return response()->json(view('site.products-render', ['products' => $products])->render());
        // }
        else {
            $products = Product::where('status', '<>', 0)->where('category_id', $category->id)->paginate(27);
        }

        if ($request->ajax()) {
            return response()->json(view('site.products-render', ['products' => $products])->render());
        }

        $options = DB::table('products')
            ->join('product_option', 'products.id', '=', 'product_option.product_id')
            ->join('options', 'options.id', '=', 'product_option.option_id')
            ->select('options.id', 'options.slug', 'options.title')
            ->where('category_id', $category->id)
            // ->where('status', 1)
            ->distinct()
            ->get();

        return view('site.catalog')->with(['category' => $category, 'result' => $request->options_id, 'products' => $products, 'options' => $options]);
    }

    public function brandProducts($company_slug)
    {
        $page = Page::where('slug', 'catalog')->firstOrFail();
        $company = Company::where('slug', $company_slug)->first();

        return view('site.catalog')->with(['page' => $page, 'products_title' => $page->title, 'products' => $company->products]);
    }

    public function product($product_id, $product_slug)
    {
        $product = Product::where('id', $product_id)->firstOrFail();
        $category = Category::where('id', $product->category_id)->firstOrFail();

        $product->views = $product->views + 1;
        $product->save();

        return view('site.product')->with(['product' => $product]);
    }

    public function catalogs()
    {
        $page = Page::where('slug', 'katalog-zapchastey')->firstOrFail();

        $files = Storage::files('catalogs');

        return view('site.parts-catalogs')->with(['page' => $page, 'files' => $files]);
    }

    public function contacts()
    {
        $page = Page::where('slug', 'contacts')->firstOrFail();

        return view('site.contacts')->with('page', $page);
    }
}
