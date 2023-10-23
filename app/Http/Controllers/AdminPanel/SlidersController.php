<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active_slider=Sliders::where('id','=','1')->get();
        $other_slider=Sliders::where('id','>','1')->get();
        return view("admin.sliders.index",[
            'active_slider' => $active_slider,
            'other_slider' => $other_slider,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.sliders.create"
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Sliders();
        $data->firsttitle = $request->firsttitle;
        $data->secondtitle = $request->secondtitle;
        $data->description = $request->description;
        if($request->file('image')){
            $data->image=$request->file('image')->store('public/images');
        };
        $data->save();
        return redirect('admin/sliders');
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
        $data=Sliders::find($id);
        return view("admin.sliders.edit ",[
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Sliders::find($id);
        $data->firsttitle = $request->firsttitle;
        $data->secondtitle = $request->secondtitle;
        $data->description = $request->description;
        if($request->file('image')){
            $data->image=$request->file('image')->store('public/images');
        };
        $data->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Sliders::find($id);
        Storage::delete($data->image);
        $data->delete();
        return redirect('admin/sliders');
    }
}
