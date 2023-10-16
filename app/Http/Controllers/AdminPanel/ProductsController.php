<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Product::all();
        return view("admin.products.index",[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Category::all();
        return view("admin.products.create",[
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Product();
        $data->category_id = $request->category_id;
        $data->user_id = $request->user_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->tax = $request->tax;
        $data->quantity = $request->quantity;
        $data->minquantity = $request->minquantity;
        $data->status = $request->status;
        if($request->file('image')){
            $data->image=$request->file('image')->store('public/images');
        };
        $data->save();
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Product::find($id);
        $datalist=Category::all();
        return view("admin.products.edit ",[
            'data' => $data,
            'datalist' => $datalist
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Product::find($id);
        $data->category_id = $request->category_id;
        $data->user_id = $request->user_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->tax = $request->tax;
        $data->quantity = $request->quantity;
        $data->minquantity = $request->minquantity;
        $data->status = $request->status;
        if($request->file('image')){
            $data->image=$request->file('image')->store('public/images');
        };
        $data->save();
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Product::find($id);
        Storage::delete($data->image);
        $data->delete();
        return redirect('admin/products');
    }
}
