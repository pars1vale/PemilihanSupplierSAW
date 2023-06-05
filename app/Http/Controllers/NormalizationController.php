<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PDF;

class NormalizationController extends Controller
{
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

        foreach ($alternatives as $a) {
            $afilter = collect($scores)->where('ida', $a->id)->values()->all();
            foreach ($criteriaweights as $icw => $cw) {
                $rates = $scores->where('idw', $cw->id)->pluck('rating')->toArray();
                $rates = array_values(array_filter($rates));

                if ($cw->type == 'benefit') {
                    $result = $afilter[$icw]->rating / max($rates);
                    $afilter[$icw]->rating = round($result, 2);
                } elseif ($cw->type == 'cost') {
                    $result = min($rates) / $afilter[$icw]->rating;
                    $afilter[$icw]->rating = round($result, 2);
                }
            }
        }

        $data = [
            'title' => 'NORMALISASI',
            'date' => date('d/m/Y'),
            'alternatives' => $alternatives,
            'scores' => $scores,
            'criteriaweights' => $criteriaweights,
            'suppliers' => $suppliers,
            'i' => 0,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('normalization.pdf', $data);
            return $pdf->stream('normalization.pdf');
        }

        // return view('normalization.index', $data);
        return view('normalization.index', compact('suppliers','scores', 'alternatives', 'criteriaweights'))->with('i', 0);
    }
}
