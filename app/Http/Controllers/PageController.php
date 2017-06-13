<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Option;
use App\Product;
use App\Company;
use App\Category;

class PageController extends Controller
{
    public function index()
    {
    	$new_products = Product::where('status', 1)->where('mode', '2')->take(9)->get();
        $last_products = Product::where('status', 1)->where('mode', '3')->take(9)->get();

        return view('site.index', compact('new_products', 'last_products'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('site.page')->with('page', $page);
    }

    public function categoryProducts(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if (isset($request->options_id) AND !empty($request->options_id)) {

            list($keys, $options_id) = array_divide($request->options_id);

            $products = Product::where('status', 1)->where('category_id', $category->id)
                ->whereHas('options', function ($query) use ($options_id) {
                    $query->whereIn('option_id', $options_id);
                })->paginate(27);

            $products->appends([
                'options_id' => $options_id
            ]);

            return response()->json(view('site.products-render', ['products' => $products])->render());
        }
        else if ($request->ajax()) {
            $products = Product::where('status', 1)->where('category_id', $category->id)->paginate(27);
            return response()->json(view('site.products-render', ['products' => $products])->render());
        }
        else {
            $products = Product::where('status', 1)->where('category_id', $category->id)->paginate(27);
        }


        $options = Option::orderBy('sort_id')->take(80)->get();

        if ($request->ajax()) {
            return response()->json(view('site.products-render', ['products' => $products])->render());
        }

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

        return view('site.product')->with(['product' => $product]);
    }

    public function contacts()
    {
        $page = Page::where('slug', 'contacts')->firstOrFail();

        return view('site.contacts')->with('page', $page);
    }
}
