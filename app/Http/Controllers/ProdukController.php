<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // cara bawaan laravel
        // $var_produk = Kategori::all();
        // // $venus = Venus::paginate(20);
        
        // return view('kategori.index', ['var_produk' => $var_produk]);

        
        $var_kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori'); // pluck(' yang dibutuhkan nama_kategori', ' dan keynya yang di panggil id_kategori')
         return view('produk.index',compact('var_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function data()
    {
        // $var_produk = Produk::orderBy('id_produk', 'desc')->get(); //khusus tidak ada relasi table pakek ini
         
        $var_produk = Produk::leftJoin('kategori', 'kategori.id_kategori','produk.id_kategori' )// khusus ada relasi table pakek ini
        ->select('produk.*', 'nama_kategori') // untuk menampilkan nama kategori 
        ->orderBy('kode_produk', 'asc')->get();// order by yaitu ditampilkan data berdasar kodeproduk secara berurutan dari 1 ke angka tertinggi
        

        return datatables()
        ->of($var_produk)
        ->addIndexColumn() //  di gunakan untuk menampilkan ID dan lain2
        ->addColumn('select_all', function ($var_produk){
            return '<input type="checkbox" name="id_produk[]" value="'.$var_produk->id_produk .'">';
        }) //  di gunakan untuk membuat checkbox
        ->addColumn('kode_produk', function ($var_produk){
            return '<span class="label label-success">'.$var_produk->kode_produk .'</span>';
        }) //  di gunakan untuk mempercantik tampilan kode_produk
        ->addColumn('harga_beli', function ($var_produk){
            return format_uang($var_produk->harga_beli);
        }) //  di gunakan untuk format angka dengan memanggil fungsi helper format_uang
        ->addColumn('harga_jual', function ($var_produk){
            return format_uang($var_produk->harga_jual);
        }) //  di gunakan untuk format angka dengan memanggil fungsi helper format_uang
        ->addColumn('stok', function ($var_produk){
            return format_uang($var_produk->stok);
        }) //  di gunakan untuk format angka dengan memanggil fungsi helper format_uang
        
        ->addColumn('aksi', function ($var_produk){
            return '
	<div class="btn-group">
                <button type="button" onclick="editForm(`'. route('produk.update', $var_produk->id_produk) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-edit"></i></button>
                <button type="button" onclick="deleteData(`'. route('produk.destroy', $var_produk->id_produk) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
               </div>
                ';
        })
        ->rawColumns(['aksi','kode_produk','select_all']) // membuat kolom aksi yang mempunyai button
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //cara 1:
        // $var_produk = new Produk();
        // $var_produk->nama_produk = $request->nama_produk;
        // $var_produk->save();
        
        $var_produk = Produk::latest()->first() ?? new Produk(); // cara ini untuk menginputkan data kode produk di karenakan kode produk merupakan barcode dan uniq
        $request['kode_produk'] = 'WS'. tambah_nol_didepan((int)$var_produk->id_produk +1, 6); // menampilkan id produk dan berjumlah 6 angka
        // cara 2
        $var_produk = Produk::create($request->all());

        return response()->json('data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $var_produk = Produk::find($id);
        return response()->json($var_produk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $var_produk = Produk::find($id);
        $var_produk->update($request->all());
        
        return response()->json('data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $var_produk = Produk::find($id);
       $var_produk -> delete();

       return response(null, 204);
    }
    public function deleteterpilih(Request $request)
    {
        foreach ($request->id_produk as $id) {
            $var_produk = Produk::find($id);
            $var_produk -> delete();

        }

       return response(null, 204);
    }
    public function cetakBarcode(Request $request)
    {
        $dataproduk = array(); // membuat penampung looping
        foreach ($request->id_produk as $id) { 
            $var_produk = Produk::find($id);// dataproduk pasing ke view($var_produk) 
            $dataproduk[] = $var_produk;
        }

        $no  = 1;
        $pdf = PDF::loadView('produk.barcode', compact('dataproduk', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('produk.pdf');
    }
}
