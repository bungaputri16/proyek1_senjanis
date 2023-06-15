<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::all();
        return view('admin.transaksi.index', compact('data'));
    }

    public function generatePDF(){
        $transaksis = Transaksi::all();

        $data = [
            'title' => 'Laporan Transaksi',
            'transaksis' => $transaksis
        ];

        $pdf = PDF::loadView('laporan', $data);

        return $pdf->download('laporan_transaksi.pdf');
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
        //
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

 
    public function search(Request $request){
        $keyword = $request->input('keyword');

        // Melakukan pencarian berdasarkan nomor transaksi atau nama
        $transaksis = Transaksi::where('nomor_transaksi', 'LIKE', "%$keyword%")
                               ->orWhere('nama', 'LIKE', "%$keyword%")
                               ->get();
    
        return view('admin.transaksi.index', compact('transaksis'));
    }

}
