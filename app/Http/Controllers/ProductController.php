<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::all();
        $sections = Section::all();
        return view('products/products_index',compact('products','sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sections|max:255',
            'section_id' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم المنتج',
            'section_id.required' =>'يرجي اختيار القسم',

        ]);
        $product= new Product();
        //Section::create($request->all());
        $product->name=$request->name;
        if($request->description)
            $product->description=$request->description;
        $product->section_id= $request->section_id;
        $product->save();
        Session::flash('Add','تم اضافه '.$request->name.' بنجاح ');
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|max:255|',
            'section_id' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم المنتج',
            'section_id.required' =>'الرجاء اختيار القسم',

        ]);

        $products = Product::findOrfail($id);
        $products->update([
            'name' => $request->name,
            'section_id'=>$request->section_id,
            'description' => $request->description,
        ]);

        session()->flash('edit','تم تعديل المنتج بنجاج');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Product::findOrfail($id)->delete();
        session()->flash('delete','تم حذف المنتج بنجاح');
        return redirect('/products');
    }
}
