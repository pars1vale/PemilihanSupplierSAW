<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use PDF;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $supplier = Supplier::get();
        $data = [
            'title' => 'DATA SUPPLIER',
            'date' => date('d/m/Y'),
            'supplier' => $supplier
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('supplier.pdf', $data);
            return $pdf->download('supplier.pdf');
        }

        return view('supplier.index', compact('supplier'));
    }

    public function create()
    {
        $supplier = Supplier::get();
        return view('supplier.create', compact('supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'supplier successfully added.');
    }

    public function show(CriteriaRating $criteriaRating)
    {
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->nama_supplier = $request->input('nama_supplier');
        $supplier->alamat = $request->input('alamat');
        $supplier->no_telp = $request->input('no_telp');
        $supplier->save();

        return redirect()->route('supplier.index')->with('success', 'supplier successfully updated.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'supplier successfully deleted.');
    }
}
