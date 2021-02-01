<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\App;
use App\Project;
use App\Product;
use App\Category;

class InputController extends Controller
{
    public function search(Request $request)
    {
        $text = trim(strip_tags($request->text));

	    // $products = Product::where('status', 1)
	    //     ->where(function($query) use ($text, $qQuery) {
	    //         return $query->where('barcode', 'LIKE', '%'.$text.'%')
	    //         ->orWhere('title', 'LIKE', '%'.$text.'%')
	    //         ->orWhere('oem', 'LIKE', '%'.$text.'%');
	    //     })->paginate(27);

        $products = Product::search($text)->paginate(28);
        // $products = Product::where('status', '<>', 0)->searchable($text)->paginate(28);

        $products->appends([
            'text' => $request->text,
        ]);

        return view('found', compact('text', 'products'));
    }

    public function searchAjax(Request $request)
    {
        $text = trim(strip_tags($request->text));

        $products = Product::search($text)->take(10)->get();

        return view('suggestions-render', ['products' => $products]);
    }

    public function searchAjaxAdmin(Request $request)
    {
        $text = trim(strip_tags($request->text));
        $products = Product::search($text)->take(15)->get();
        $array = [];

        foreach ($products as $key => $product) {

            $image = 'no-image-mini.png';
            $path = '';

            if ($product->images == true) {
                $path = 'products/'.$product->path;
                $images = unserialize($product->images);
                $image = $images[0]['mini_image'];
            }

            $array[$key]['id'] = $product->id;
            $array[$key]['path'] = $path;
            $array[$key]['image'] = $image;
            $array[$key]['barcode'] = $product->barcode;
            $array[$key]['title'] = $product->title;
            $array[$key]['lang'] = $product->lang;
        }

        return response()->json($array);
    }

    public function filterProducts(Request $request)
    {
        $from = ($request->price_from) ? (int) $request->price_from : 0;
        $to = ($request->price_to) ? (int) $request->price_to : 9999999999;

        $products = Product::where('status', 1)->whereBetween('price', [$request->from, $request->to])->paginate(27);

        return redirect()->back()->with([
            'alert' => $status,
            'products' => $products
        ]);
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

        $project = Project::where('name', $request->project)->first();

        $app = new App;
        $app->project_id = $project->id;
        $app->name = $request->name;
        $app->email = $request->email;
        $app->phone = $request->phone;
        $app->message = $request->message;
        $app->save();

        // Email subject
        $subject = "SapaParts - " . $project->name . " Новая заявка от $request->name";

        // Email content
        $content = "<h2>SapaParts - " . $project->name . "</h2>";
        $content .= "<b>Имя: $request->name</b><br>";
        $content .= "<b>Номер: $request->phone</b><br>";
        $content .= "<b>Email: $request->email</b><br>";
        $content .= "<b>Текст: $request->message</b><br>";
        $content .= "<b>Дата: " . date('Y-m-d') . "</b><br>";
        $content .= "<b>Время: " . date('G:i') . "</b>";

        $headers = "From: info@sapaparts.kz \r\n" .
                   "MIME-Version: 1.0" . "\r\n" . 
                   "Content-type: text/html; charset=UTF-8" . "\r\n";

        // Send the email
        if (mail('issayev.adilet@gmail.com', $subject, $content, $headers)) {
            $status = 'alert-success';
            $message = 'Ваша заявка принята. Спасибо!';
        }
        else {
            $status = 'alert-danger';
            $message = 'Произошла ошибка.';
        }

        // dd($status, $message);
        return redirect()->back()->with([
            'status' => $status,
            'message' => $message
        ]);
    }
}