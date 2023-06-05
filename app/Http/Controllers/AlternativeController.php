<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use App\Models\CriteriaRating;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PDF;


class AlternativeController extends Controller
{

    public function index(Request $request)
    {
    $scores = AlternativeScore::select(
        'alternativescores.id as id',
        'alternatives.id as ida',
        'criteriaweights.id as idw',
        'criteriaratings.id as idr',
        'supplier.id as idsup',
        'supplier.nama_supplier as nama_supplier', // Mengganti 'alternatives.name' menjadi 'supplier.nama_supplier'
        'criteriaweights.name as criteria',
        'criteriaratings.rating as rating',
        'criteriaratings.description as description')
    ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
    ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
    ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
    ->leftJoin('supplier', 'supplier.id', '=', 'alternatives.id_supplier') // Mengganti 'alternatives.id' menjadi 'supplier.id'
    ->get();

    $alternatives = Alternative::get();
    $criteriaweights = CriteriaWeight::get();
    $suppliers = Supplier::all();
    $data = [
        'title' => 'DATA ALTERNATIVE',
        'date' => date('d/m/Y'),
        'scores' => $scores,
        'alternatives' => $alternatives,
        'criteriaweights' => $criteriaweights,
        'suppliers' => $suppliers,
    ];

    if ($request->has('download')) {
        $pdf = PDF::loadView('alternative.pdf', $data);
        return $pdf->download('alternative.pdf');
    }
    
    return view('alternative.index', compact('scores', 'alternatives', 'criteriaweights', 'suppliers'))->with('i', 0);
    }


    public function create()
    {
        $suppliers = Supplier::all();
        $criteriaweights = CriteriaWeight::get();
        $criteriaratings = CriteriaRating::get();
        return view('alternative.create', compact('suppliers','criteriaweights', 'criteriaratings'));
    }


    public function store(Request $request)
    {
    $request->validate([
        'nama_supplier' => 'required'
    ]);

    // Save the alternative
    $supplier = Supplier::where('nama_supplier', $request->nama_supplier)->first();

    if (!$supplier) {
        return redirect()->back()->withErrors(['Supplier not found.']);
    }

    $alt = new Alternative;
    $alt->id_supplier = $supplier->id;
    $alt->save();

    // Save the score
    $criteriaweight = CriteriaWeight::get();
    foreach ($criteriaweight as $cw) {
        $score = new AlternativeScore();
        $score->alternative_id = $alt->id;
        $score->criteria_id = $cw->id;
        $score->rating_id = $request->input('criteria')[$cw->id];
        $score->save();
    }

    return redirect()->route('alternatives.index')
        ->with('success', 'Alternative created successfully.');
    }


    public function show(Alternative $alternative)
    {
        //
    }


    public function edit(Alternative $alternative)
    {
        $criteriaweights = CriteriaWeight::get();
        $criteriaratings = CriteriaRating::get();
        $supplier = Supplier::all();
        $alternativescores = AlternativeScore::where('alternative_id', $alternative->id)->get();
        return view('alternative.edit', compact('supplier','alternative', 'alternativescores', 'criteriaweights', 'criteriaratings'));
    }


    public function update(Request $request, Alternative $alternative)
    {
        // Save the score
        $scores = AlternativeScore::where('alternative_id', $alternative->id)->get();
        $criteriaweight = CriteriaWeight::get();
        foreach ($criteriaweight as $key => $cw) {
            $scores[$key]->rating_id = $request->input('criteria')[$cw->id];
            $scores[$key]->save();
        }

        return redirect()->route('alternatives.index')
            ->with('success', 'Alternative updated successfully');
    }

    public function destroy(Alternative $alternative)
    {
        $scores = AlternativeScore::where('alternative_id', $alternative->id)->delete();
        $alternative->delete();

        return redirect()->route('alternatives.index')
            ->with('success', 'Alternative deleted successfully');
    }
}