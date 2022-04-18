<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $categories=Category::all();
        return view('dashboard.products.index',['products'=>$products,'categories'=>$categories]);
    }

    public function indexhero()
    {
        $products=Product::all();
        return view('dashboard.hero.index',['products'=>$products]);
    }

    public function updateetat(Request $request, $id)
    {

        // dd($request);
        $productEtat = Product::find($id);

        if($request->hero == ""){
            $productEtat->hero = "off";
        }else{
            $productEtat->hero = "on";
        }

        $productEtat->save();
        return redirect(route('indexhero'))->with('msg','Product updated');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'description_en' => 'required|max:255',
            'description_ar' => 'required|max:255',
            'price' => 'required|max:255',
            'category_id' => 'required|max:255',
            'solde' => 'required|max:255',
            'photo'=>'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);



        $product = new Product();

        if($request->hasFile('photo')){
            $number = mt_rand(1, 999999);
            $image = $request->file('photo');
            $destinationPath = 'products_photo';
            $image->move($destinationPath, $number . $image->getClientOriginalName());
            $product->photo = $destinationPath . "/" . $number . $image->getClientOriginalName();
        }
        $product->name_ar=$request->name_ar;
        $product->name_en=$request->name_en;
        $product->description_en=$request->description_en;
        $product->description_ar=$request->description_ar;
        $product->price=$request->price;
        $product->category_id=$request->category_id;
        $product->solde=$request->solde;
        $product->save();
        return redirect('products')->with('added','products added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('dashboard.products.details',['product'=>Product::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.products.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'price' => 'required|max:255',
            'category_id' => 'required|max:255',
            'solde' => 'required|max:255',
            'description_en' => 'required|max:255',
            'description_ar' => 'required|max:255',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        if($request->hasFile('photo')){
            if (File::exists($product->photo)) {
                unlink($product->photo);
            }
            $number = mt_rand(1, 999999);
            $image = $request->file('photo');
            $destinationPath = 'categories_photo';
            $image->move($destinationPath, $number . $image->getClientOriginalName());
            $product->photo = $destinationPath . "/" . $number . $image->getClientOriginalName();
        }
        $product->name_en=$request->name_en;
        $product->name_ar=$request->name_ar;
        $product->solde=$request->solde;
        $product->price=$request->price;
        $product->category_id=$request->category_id;
        $product->description_en=$request->description_en;
        $product->description_ar=$request->description_ar;
        $product->save();
        return redirect('products')->with('msg','Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Product::find($id);
        if (File::exists($product->photo)) {
            unlink($product->photo);
        }
        $product->delete();
        return redirect('products')->with('msg','Product deleted');
    }
}
