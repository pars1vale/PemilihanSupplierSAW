<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPembelian;
use App\Models\Barang;
use App\Models\Supplier;
use PDF;

class RiwayatPembelianController extends Controller
{
    public function index(Request $request)
    {
        // $riwayatpembelian = RiwayatPembelian::with('barang', 'supplier')->get();
        // return view('riwayat_pembelian.index', compact('riwayatpembelian'));
        $barang = Barang::get();
        $supplier = Supplier::get();
        $riwayatpembelian = RiwayatPembelian::select(
            'riwayat_pembelian.id as id',
            
            'riwayat_pembelian.id_barang as idbar',
            'barang.nama_barang as namabar',

            'riwayat_pembelian.id_supplier as idsup',
            'supplier.nama_supplier as namasup',
            
            'riwayat_pembelian.tanggal_pembelian as tgl',
            'riwayat_pembelian.jumlah_barang as jmlbarang',
            'riwayat_pembelian.harga_satuan as satuan',
            'riwayat_pembelian.total_harga as total',
            'riwayat_pembelian.status_pembayaran as status',
        )
        ->leftJoin('barang','riwayat_pembelian.id_barang', '=', 'barang.id')
        ->leftJoin('supplier','riwayat_pembelian.id_supplier', '=', 'supplier.id')
        ->get();

        $data = [
            'title' => 'DATA RIWAYAT PEMBELIAN',
            'date' => date('d/m/Y'),
            'riwayatpembelian' => $riwayatpembelian,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('riwayat_pembelian.pdf', $data);
            return $pdf->download('riwayat_pembelian.pdf');
        }

        return view('riwayat_pembelian.index', compact('riwayatpembelian','barang','supplier'))->with('i', 0);
    }

    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('riwayat_pembelian.create', compact('barang', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_supplier' => 'required',
            'tanggal_pembelian' => 'required',
            'jumlah_barang' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'status_pembayaran' => 'required',
        ]);

        RiwayatPembelian::create($request->all());

        return redirect()->route('riwayat.index')
            ->with('success', 'Riwayat pembelian berhasil ditambahkan.');
    }

    public function show()
    {
        
    }
    // public function show($id)
    // {
    //     $riwayatpembelian = RiwayatPembelian::findOrFail($id);
    //     return view('riwayat_pembelian.show', compact('riwayatpembelian'));
    // }

    public function edit($id)
    {
        $riwayatpembelian = RiwayatPembelian::findOrFail($id);
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('riwayat_pembelian.edit', compact('riwayatpembelian', 'barang', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_supplier' => 'required',
            'tanggal_pembelian' => 'required',
            'jumlah_barang' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'status_pembayaran' => 'required',
        ]);

        $riwayatpembelian = RiwayatPembelian::findOrFail($id);
        $riwayatpembelian->update($request->all());

        return redirect()->route('riwayat.index')
            ->with('success', 'Riwayat pembelian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $riwayatpembelian = RiwayatPembelian::findOrFail($id);
        $riwayatpembelian->delete();

        return redirect()->route('riwayat.index')
            ->with('success', 'Riwayat pembelian berhasil dihapus.');
    }
}