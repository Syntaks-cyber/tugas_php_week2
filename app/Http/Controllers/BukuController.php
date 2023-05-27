<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Buku;
use App\Http\Requests\BukuRequest;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::orderBy('isbn','ASC')->paginate(10);
        return view('buku.index',compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
        $cekISBN = Buku::where('isbn','=',$request->isbn);
        if($cekISBN->count()){
            Session::flash('err_msg','ISBN : '.$request->isbn.' Sudah Dipakai');
            return redirect('/buku/create')->withInput();
        }else{
            Buku::create($request->all());
            Session::flash('msg','Buku '.$request->judul.' Berhasil Ditambahkan');
            return redirect('/buku');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $isbn
     * @return \Illuminate\Http\Response
     */
    public function show($isbn)
    {
        $buku = Buku::findOrFail($isbn);
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $isbn
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        $buku = Buku::findOrFail($isbn);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $isbn
     * @return \Illuminate\Http\Response
     */
    public function update(BukuRequest $request, $isbn)
    {
        $buku = Buku::findOrFail($isbn);
        $buku->update($request->all());
        Session::flash('msg','Buku '.$request->judul.' Berhasil Diupdate');
        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $isbn
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
        $buku = Buku::findOrFail($isbn);
        $buku->delete();
        Session::flash('msg','Buku '.$buku->judul.' Berhasil Dihapus');
        return redirect('/buku');
    }

    public function search(Request $request){
        $cari = $request->get('search');
        $bukus = Buku::where('judul','LIKE','%'.$cari.'%')->paginate(10);
        return view('buku.index', compact('bukus'));
    }
}
