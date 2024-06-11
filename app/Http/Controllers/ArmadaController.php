<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Armada;
use App\Models\Picture;

class ArmadaController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $armadas=Armada::latest()->paginate(10);
        return view('backend.armadas.index',['armadas'=>$armadas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.armadas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'max_weight'=>'required|numeric',
            'length'=>'required|numeric',
            'width'=>'required|numeric',
            'height'=>'required|numeric'
        ]);
        $armada=Armada::create([
            'name'=>$request->name,
            'max_weight'=>$request->max_weight,
            'length'=>$request->length,
            'width'=>$request->width,
            'height'=>$request->height,
        ]);

        foreach ($request->file('files') as $file){
            $filename = time().rand(1,200).'.'.$file->extension();
            $file->move(public_path('uploads'),$filename);
            Picture::create([
                'armada_id'=>$armada->id,
                'filename'=> $filename
            ]);
        }

        return redirect('/backend-armadas')->with('success','Data Armada berhasil ditambahkan.');
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
        return view('backend.armadas.edit', [
            'armadas'=>Armada::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'max_weight'=>'required|numeric',
            'length'=>'required|numeric',
            'width'=>'required|numeric',
            'height'=>'required|numeric'
        ]);

        $armada=Armada::find($id);
        $armada->update([
            'name'=>$request->name,
            'max_weight'=>$request->max_weight,
            'length'=>$request->length,
            'width'=>$request->width,
            'height'=>$request->height
        ]);

        foreach ($request->file('files') as $file){
            $filename = time().rand(1,200).'.'.$file->extension();
            $file->move(public_path('uploads'),$filename);
            Picture::create([
                'armada_id'=>$armada->id,
                'filename'=> $filename
            ]);
        }

        return redirect('/backend-armadas')->with('success', 'Data Armada Berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Armada::destroy($id);
        return redirect('/backend-armadas')->with('success', 'Data Armada Berhasil dihapus.');
    }
}