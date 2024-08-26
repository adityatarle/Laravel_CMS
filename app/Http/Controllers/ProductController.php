<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function home()
    {
        
        return view('home',['products'=> Product::get()]);
    }
        
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    
    {
        $products = Product::paginate(5); // This will return a paginated result
    return view('products.dashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        


       $imageName = time().'.'.$request->image->extension();
       $request->image->move(public_path('products'),$imageName);

       $product = new product();
       $product->image = $imageName;
       $product->name = $request->name;
       $product->heading = $request->heading;
       $product->description = $request->description;

       $product->save();
       return back()->withSuccess('product created successfully !!');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.show',['product'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();

        return view('products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(Request $request, $id){

        $product = Product::where('id',$id)->first();

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image = $imageName;
        }
 
        $product->heading = $request->heading;
        $product->name = $request->name;
        $product->description = $request->description;
 
        $product->save();

    // Redirect back with a success message
    return redirect()->route('product.dashboard')->withSuccess('Product updated successfully!');

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product deleted successfully!');
    }
}
