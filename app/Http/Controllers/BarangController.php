<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use PDF;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barang = Barang::all();
        $data = [
            'title' => 'DATA BARANG',
            'date' => date('d/m/Y'),
            'barang' => $barang,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('barang.pdf', $data);
            return $pdf->download('barang.pdf');
        }

        return view('barang.barang', compact('barang'));
    }

    public function create()
    {
        return view('barang.tambah');
    }

    public function store(Request $request)
    {
        // untuk validasi form
        $request->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'deskripsi' => 'required',
            'tanggal_produksi' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        // untuk insert data ke database
        Barang::create($request->all());

        return redirect('/barang')->with('success', 'Barang Baru Telah Ditambahkan');
    }

    public function show(Barang $barang)
    {
        //
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'satuan' => 'required',
            'deskripsi' => 'required',
            'tanggal_produksi' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        //cara pertama
        // $barang = Barang::find($id);
        // $barang->nama_barang = $request->nama_barang;
        // $barang->satuan = $request->satuan;
        // $barang->deskripsi = $request->deskripsi;
        // $barang->tanggal_produksi = $request->tanggal_produksi;
        // $barang->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        // $barang->save();

        //cara ke2
        $barang = Barang::FindOrFail($id);
        $barang->update($request->all());
        return redirect('/barang')->with('success', 'Barang Telah Diubah');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        // return redirect('/barang');
        return redirect()
            ->back()
            ->with('success', 'Barang Telah Diubah');
        return redirect()
            ->route('alternatives.index')
            ->with('success', 'Alternative deleted successfully');
    }
    // public function hapus(String $id)
    // {
    //     $barang = Barang::findOrFail($id);
    //     $barang->delete();
    //     return redirect('/barang');
    //     return redirect()->back()->with('success', 'Barang Telah Diubah');
    // }
}
