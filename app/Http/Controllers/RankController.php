<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PDF;

class RankController extends Controller
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
            $afilter = $scores->where('ida', $a->id)->values()->all();
            $total = 0;

            foreach ($criteriaweights as $icw => $cw) {
                $rates = $scores->where('idw', $cw->id)->pluck('rating')->toArray();
                $rates = array_values(array_filter($rates));

                if ($cw->type == 'benefit') {
                    $result = $afilter[$icw]->rating / max($rates);
                } elseif ($cw->type == 'cost') {
                    $result = min($rates) / $afilter[$icw]->rating;
                }

                $result *= $cw->weight;
                $afilter[$icw]->rating = round($result, 2);
                $total += $afilter[$icw]->rating;
            }
        }

        $data = [
            'title' => 'Rank',
            'date' => date('d/m/Y'),
            'alternatives' => $alternatives,
            'scores' => $scores,
            'criteriaweights' => $criteriaweights,
            'suppliers' => $suppliers,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('rank.pdf', $data);
            return $pdf->stream('rank.pdf');
        }

        return view('rank.index', compact('suppliers','scores', 'alternatives', 'criteriaweights'))->with('i', 0);
        // return view('rank.index', $data);
    }
}
