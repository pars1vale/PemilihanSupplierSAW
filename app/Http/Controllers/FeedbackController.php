<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;
use PDF;


class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $feedback = Feedback::all();
        $data = [
            'title' => 'DATA FEEDBACK',
            'date' => date('d/m/Y'),
            'feedback' => $feedback,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('feedback.pdf', $data);
            return $pdf->download('feedback.pdf');
        }
        return view('feedback.index', compact('feedback'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Feedback::create([
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('feedback.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = Feedback::findOrFail($id);
        return view('show_view', compact('data'));
    }

    public function edit($id)
    {
        $data = Feedback::findOrFail($id);
        return view('feedback.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = Feedback::findOrFail($id);
        $data->email = $request->input('email');
        $data->message = $request->input('message');
        $data->save();

        return redirect()->route('feedback.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Feedback::findOrFail($id);
        $data->delete();

        return redirect()->route('feedback.index')->with('success', 'Data berhasil dihapus.');
    }
}