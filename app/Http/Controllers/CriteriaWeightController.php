<?php

namespace App\Http\Controllers;

use App\Models\CriteriaWeight;
use Illuminate\Http\Request;
use PDF;

class CriteriaWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $criteriaweights = CriteriaWeight::get();
        $data = [
            'title' => 'DATA KRITERIA',
            'date' => date('d/m/Y'),
            'criteriaweights' => $criteriaweights,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('criteriaweight.pdf', $data);
            return $pdf->download('criteriaweight.pdf');
        }
        return view('criteriaweight.index', compact('criteriaweights'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criteriaweight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'weight' => 'required',
            'description' => 'required',
        ]);

        CriteriaWeight::create($request->all());

        return redirect()->route('criteriaweights.index')
        ->with('success','Criteria created successfully.');
    }
    
    public function show(CriteriaWeight $criteriaWeight)
    {
        // return view('criteriaweight.show',compact('criteriaWeight'));
    }

    public function edit(CriteriaWeight $criteriaweight)
    {
        return view('criteriaweight.edit',compact('criteriaweight'));
    }

    public function update(Request $request, CriteriaWeight $criteriaweight)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'weight' => 'required',
            'description' => 'required',
        ]);

        $criteriaweight->update($request->all());

        return redirect()->route('criteriaweights.index')
                        ->with('success','Criteria updated successfully');
    }

    public function destroy(CriteriaWeight $criteriaweight)
    {
        $criteriaweight->delete();

        return redirect()->route('criteriaweights.index')
                        ->with('success','Criteria deleted successfully');
    }
}