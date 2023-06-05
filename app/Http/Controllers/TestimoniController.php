<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Testimoni;
use PDF;

class TestimoniController extends Controller
{
    public function index(Request $request)
    {
        $barang = Barang::get();
        $supplier = Supplier::get();
        $testimoni = Testimoni::select(
            'testimoni.id as id',
            
            'testimoni.id_barang as idbar',
            'barang.nama_barang as namabar',

            'testimoni.id_supplier as idsup',
            'supplier.nama_supplier as namasup',
            
            'testimoni.rating as rating',
            'testimoni.keterangan as ket')
            ->leftJoin('barang', 'testimoni.id_barang', '=', 'barang.id')
            ->leftJoin('supplier', 'testimoni.id_supplier', '=', 'supplier.id')
        ->get();

        $data = [
            'title' => 'DATA BARANG',
            'date' => date('d/m/Y'),
            'testimoni' => $testimoni,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('testimoni.pdf', $data);
            return $pdf->download('testimoni.pdf');
        }

    	return view('testimoni.index', compact('testimoni', 'barang', 'supplier'))->with('i', 0);
    }

    public function create()
    {
        $barang = Barang::get();
        $supplier = Supplier::get();
        $testimoni = Testimoni::get();
        return view('testimoni.create', compact('testimoni', 'barang', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_supplier' => 'required',
            'rating' => 'required',
            'keterangan' => 'required',
        ]);

        Testimoni::create($request->all());

        return redirect()->route('testimoni.index')->with('success','testimoni successfully added.');
    }

    public function show(CriteriaRating $criteriaRating)
    {
        
    }

    public function edit(Testimoni $testimoni)
    {
        $barang = Barang::get();
        $supplier = Supplier::get();
        return view('testimoni.edit', compact('testimoni', 'barang', 'supplier'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_supplier' => 'required',
            'rating' => 'required',
            'keterangan' => 'required',
        ]);

        $testimoni->update($request->all());
        return redirect()->route('testimoni.index')->with('success','testimoni successfully updated.');
    }

    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();
        return redirect()->route('testimoni.index')->with('success','testimoni successfully deleted.');
    }
}