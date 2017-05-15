<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\App;
use App\News;
use App\Page;
use App\Option;
use App\Product;
use App\Company;
use App\Category;

class MainController extends Controller
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

    public function catalog()
    {
        $page = Page::where('slug', 'catalog')->firstOrFail();
        // $categories = Category::orderBy('sort_id')->get();

        return view('site.catalog')->with(['page' => $page]);
    }

    public function categoryProducts($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $products = Product::where('category_id', $category->id)->paginate(27);
        $options = Option::orderBy('sort_id')->get();

        return view('site.products')->with(['category' => $category, 'products' => $products, 'options' => $options]);
    }

    public function brandProducts($company_slug)
    {
        $page = Page::where('slug', 'catalog')->firstOrFail();
        $company = Company::where('slug', $company_slug)->first();

        return view('site.products')->with(['page' => $page, 'products_title' => $page->title, 'products' => $company->products]);
    }

    public function product($product_id, $product_slug)
    {
        $product = Product::where('id', $product_id)->firstOrFail();
        $category = Category::where('id', $product->category_id)->firstOrFail();

        return view('site.product')->with(['product' => $product]);
    }

    public function news()
    {
        $page = Page::where('slug', 'news')->firstOrFail();
        $news = News::orderBy('created_at')->paginate(30);

        return view('site.news')->with(['page' => $page, 'news' => $news]);
    }

    public function newsPage($slug)
    {
        $page = Page::where('slug', 'news')->firstOrFail();
        $newsData = News::where('slug', $slug)->firstOrFail();

        return view('site.news-page')->with(['page' => $page, 'newsData' => $newsData]);
    }

    public function sendApp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:60',
            'phone' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect('/#contact-form')->withErrors($validator)->withInput();
        }

        $app = new App;
        $app->name = $request->name;
        $app->email = $request->email;
        $app->phone = $request->phone;
        $app->message = $request->message;
        $app->save();

        // Email subject.
        $subject = "Japan Import - novaya zayavka ot $request->name";

        // Email content.
        $content = "<h2>Japan Import</h2>";
        $content .= "<b>Имя: $request->name</b><br>";
        $content .= "<b>Номер: $request->phone</b><br>";
        $content .= "<b>Email: $request->email</b><br>";
        $content .= "<b>Текст: $request->message</b><br>";
        $content .= "<b>Дата: " . date('Y-m-d') . "</b><br>";
        $content .= "<b>Время: " . date('G:i') . "</b>";

        $headers = "From: info@jpi.kz \r\n" .
                   "MIME-Version: 1.0" . "\r\n" . 
                   "Content-type: text/html; charset=UTF-8" . "\r\n";

        // Send the email.
        if (mail('issayev.adilet@gmail.com', $subject, $content, $headers)) {
            $status = 'alert-success';
            $message = 'Ваша заявка принято.';
        }
        else {
            $status = 'alert-danger';
            $message = 'Произошла ошибка.';
        }

        return redirect()->back()->with([
            'alert' => $status,
            'message' => $message
        ]);
    }

    public function contacts()
    {
        $page = Page::where('slug', 'contacts')->firstOrFail();

        return view('site.contacts')->with('page', $page);
    }
}
