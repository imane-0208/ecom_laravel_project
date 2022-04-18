<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        return view('dashboard.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.add');
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
            'photo'=>'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);




        $category = new Category();

        if($request->hasFile('photo')){

            $number = mt_rand(1, 999999);
            $image = $request->file('photo');
            $destinationPath = 'categories_photo';
            $image->move($destinationPath, $number . $image->getClientOriginalName());
            $category->photo = $destinationPath . "\\" . $number . $image->getClientOriginalName();
        }
        $category->name_ar=$request->name_ar;
        $category->name_en=$request->name_en;
        $category->save();
        return redirect('categories')->with('added','Category added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.categories.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $this->validate($request,[
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        if($request->hasFile('photo')){
            if (File::exists($category->photo)) {
                unlink($category->photo);
            }
            $number = mt_rand(1, 999999);
            $image = $request->file('photo');
            $destinationPath = 'categories_photo';
            $image->move($destinationPath, $number . $image->getClientOriginalName());
            $category->photo = $destinationPath . "\\" . $number . $image->getClientOriginalName();
        }
        $category->name_ar=$request->name_ar;
        $category->name_en=$request->name_en;
        $category->save();
        return redirect('categories')->with('updated','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category =Category::find($id);
        if (File::exists($Category->photo)) {
            unlink($Category->photo);
        }
        $Category->delete();
        return redirect('categories')->with('msg','Category deleted');
    }
}
