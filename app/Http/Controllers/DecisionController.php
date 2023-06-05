<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PDF;

class DecisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $scores = AlternativeScore::select(
        'alternativescores.id as id',
        'alternatives.id as ida',
        'criteriaweights.id as idw',
        'criteriaratings.id as idr',
        'supplier.id as idsup',
        'supplier.nama_supplier as nama_supplier',
        'criteriaweights.name as criteria',
        'criteriaratings.rating as rating',
        'criteriaratings.description as description')
    ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
    ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
    ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
    ->leftJoin('supplier', 'supplier.id', '=', 'alternatives.id_supplier')
    ->get();

    $alternatives = Alternative::get();
    $criteriaweights = CriteriaWeight::get();
    $suppliers = Supplier::all(); 
    
    $data = [
        'title' => 'Decision Matrix',
        'date' => date('d/m/Y'),
        'scores' => $scores,
        'alternatives' => $alternatives,
        'criteriaweights' => $criteriaweights,
        'suppliers' => $suppliers,
    ];

    if ($request->has('download')) {
        $pdf = PDF::loadView('decision.pdf', $data);
        return $pdf->download('decision.pdf');
    }

    return view('decision.index', compact('suppliers', 'scores', 'alternatives', 'criteriaweights'))->with('i', 0);
    }
}