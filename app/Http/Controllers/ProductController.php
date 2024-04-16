<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function productAdmin()
    {
        $products = Product::all();
        return view('page.admin.product', compact('products'));
    }

    public function productUser()
    {
        $products = Product::all();
        return view('page.users.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
        }

        Product::create([
            'name' => request('name'),
            'price' => request('price'),
            'stock' => request('stock'),
            'image' => $filename,
        ]);

        return redirect(route('product'))->with('success-message', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::findorfail($id);
        $products->update($request->all());

        return redirect(route('product'))->with('success-message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        // dd($request->all());
        $products = Product::find($id);
        $products->delete();

        return redirect(route('product'))->with('delete-message', 'Product deleted successfully');
    }
}
