<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Newslatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Auth;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    //

    public function index()
    {
        $pages=Page::all();
        $categories=Category::all();
        $cartCount = "";
        if(Auth::user()){
            $cartCount = Cart::where("user_id", Auth::user()->id)->get();
        }

        $product = Product::inRandomOrder()->limit(20)->get();

        $productsHero = Product::where('hero','on')->get();

        // dd($productsHero);

            $categoriesFilter = Category::with('products')->get()->sortBy(function($hackathon)
                {
                    return $hackathon->products->count();
                })->reverse()->take(4);

            // dd($categoriesFilter);

        return view('site.index', ['pages'=>$pages,'categoriesFilter'=>$categoriesFilter,'categories'=>$categories,'product'=>$product, 'productsHero' => $productsHero,'cartCount'=>$cartCount]);
    }

    public function about()
    {
        $cartCount = "";
        $pages=Page::all();
        if(Auth::user()){
            $cartCount = Cart::where("user_id", Auth::user()->id)->get();
        }

        return view('site.about', ['pages'=>$pages,'cartCount'=>$cartCount]);
    }
    public function contact()
    {
        $pages=Page::all();

        $cartCount = "0";

        if(Auth::user()){
            $cartCount = Cart::where("user_id", Auth::user()->id)->get();
        }

        return view('site.contact',['pages'=>$pages,'cartCount'=>$cartCount]);
    }
    public function details($id)
    {
        $pages=Page::all();
        $product =Product::find($id);

        $cartCount = "";

        if(Auth::user()){
            $cartCount = Cart::where("user_id", Auth::user()->id)->get();
        }
        // dd($cartCount);

        return view('site.details',['pages'=>$pages,'product'=>$product,'cartCount'=>$cartCount]);
    }
    public function catalog()
    {
        $pages=Page::all();
        $categories=Category::all();
        $products = Product::all();

        $cartCount = "";

        if(Auth::user()){
            $cartCount = Cart::where("user_id", Auth::user()->id)->get();
        }

        return view('site.catalog',['pages'=>$pages,'products'=>$products,'categories'=>$categories,'cartCount'=>$cartCount]);
    }
    public function dashboard()
    {
        return view('dashboard.index');
    }
    public function settings()
    {
        return view('dashboard.setting');
    }
    public function catalog_search(Request $request)
    {
        $pages=Page::all();
        $categories=Category::all();
        $products = Product::where('name_en','LIKE','%'.$request->name.'%')->orWhere('name_ar','LIKE','%'.$request->name.'%')->get();

        $cartCount = "";

        if(Auth::user()){
            $cartCount = Cart::where("user_id", Auth::user()->id)->get();
        }

        return view('site.catalog',['pages'=>$pages,'products'=>$products,'categories'=>$categories,'cartCount'=>$cartCount]);
    }
    public function sendemail(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required|max:255',
        ]);
        $details=[
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ];
        Mail::to(env('MAIL_USERNAME'))->send(new ContactMail($details));
        return redirect('contact')->with('msg','your message sended');
    }
    public function newslatter(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255',
        ]);
        Newslatter::create([
            'email'=>$request->email,
        ]);
        return response()->json(['msg'=>'we will contact you soon']);
    }
    public function ar(Request $request)
    {

        if (Cookie::has('lang')) {
            Cookie::queue(Cookie::forget('lang'));
            $lang ='ar';
            Cookie::queue(cookie('lang', $lang, 60));

        }else{
            $lang ='ar';
            Cookie::queue(cookie('lang', $lang, 60));

        }
            return redirect()->back();

    }
    public function en(Request $request)
    {

        if (Cookie::has('lang')) {
            Cookie::queue(Cookie::forget('lang'));
            $lang ='en';
            Cookie::queue(cookie('lang', $lang, 60));

        }else{
            $lang ='en';
            Cookie::queue(cookie('lang', $lang, 60));

        }


        return redirect()->back();
    }
    public function fr(Request $request)
    {

        if (Cookie::has('lang')) {
            Cookie::queue(Cookie::forget('lang'));
            $lang ='fr';
            Cookie::queue(cookie('lang', $lang, 60));

        }else{
            $lang ='fr';
            Cookie::queue(cookie('lang', $lang, 60));

        }


        return redirect()->back();
    }
}
