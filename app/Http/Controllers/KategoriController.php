<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategori.index'); // artinya viewnya ada pada folder kategori dengan nama file index.blade.php
    }

    public function data()
    {
        $var_kategori = Kategori::orderBy('id_kategori', 'desc')->get();

        return datatables()
        ->of($var_kategori)
        ->addIndexColumn() //  di gunakan untuk menampilkan ID
		
		//dibawah ini contoh untuk menampilkan gambar atau foto pada tabel
		// ->addColumn('foto', function ($var_lampu){
        //     $url= asset('fotolampu/'.$value->foto);
        //     return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />'; 
        // }) 
        
		
        ->addColumn('aksi', function ($var_kategori){
            return '
                <button onclick="editForm(`'. route('kategori.update', $var_kategori->id_kategori) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-edit"></i></button>
                <button onclick="deleteData(`'. route('kategori.update', $var_kategori->id_kategori) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            ';
        })
        ->rawColumns(['aksi']) // membuat kolom aksi yang mempunyai button
        ->make(true);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cara 1:
        $var_kategori = new Kategori();
        $var_kategori->nama_kategori = $request->nama_kategori;
        $var_kategori->save();
        
        //cara 2
        // $var_kategori = Kategori::create($request->all());

        return response()->json('data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $var_kategori = Kategori::find($id);
        return response()->json($var_kategori);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
   
public function update(Request $request, $id)
{
    $var_kategori = Kategori::find($id);
    $var_kategori->nama_kategori = $request->nama_kategori;
    $var_kategori->update();
    
    return response()->json('data berhasil disimpan', 200);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $var_kategori = Kategori::find($id);
       $var_kategori -> delete();

       return response(null, 204);
    }
}
