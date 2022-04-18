<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.photos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.photos.add');
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

            'product' => 'required|max:255',
            'photo'=>'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        if($request->hasFile('photo')){
            // $number = mt_rand(1, 999999);
            // $image = $request->file('photo');
            // $destinationPath = 'products_photo';
            // $resize_image = Image::make($image->getRealPath());
            // $resize_image->resize(800, function($constraint){
            //  $constraint->aspectRatio();
            // })->save( $destinationPath . "/" . $number . $image->getClientOriginalName());
            // // $image->move($destinationPath, $number . $image->getClientOriginalName());
            $number = mt_rand(1, 999999);
            $image = $request->file('photo');
            $destinationPath = 'products_photo';
            $image->move($destinationPath, $number . $image->getClientOriginalName());
            
            Photo::create([
                'photo'=> $destinationPath . "/" . $number . $image->getClientOriginalName() ,
                'product_id'=>$request->product,
            ]);
        }

        return redirect()->back()->with('added','photo added');
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
        return view('dashboard.photos.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
