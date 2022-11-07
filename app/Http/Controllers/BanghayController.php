<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;


use App\Models\Banghay;

class BanghayController extends Controller
{
    public function index()
    {
        return view('banghay.subjects');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file;
        $data = new Banghay();

        $filename = time() . '.' . $file->getClientOriginalExtension();

        $request->file->move(public_path('assets'), $filename);
        $data->file = $filename;

        $data->name = $request->name;
        $data->gradelevel = $request->gradelevel;
        $data->subject = $request->subject;

        $data->save();
        /* (error_log($data)); */
        return redirect()->back();
        /* ->with('mssg', 'Thanks for sharing your lesson plan.'); */
    }

    public function show()
    {
        $data = Banghay::all();
        return view('banghay.displaysubjects', compact('data'));
    }

    public function download(Request $request, $file)
    {

        return response()->download(public_path('assets/' . $file));
    }

    public function preview($id)
    {
        $data = Banghay::find($id);

        return view('banghay.displaysubjects', compact('data'));
    }


    public function gradeone()
    {
        $datas = Banghay::where('gradelevel', 'Grade 1')->get();
        return view('banghay.gradeone', compact('datas'));
    }

    public function gradetwo()
    {
        $datas = Banghay::where('gradelevel', 'Grade 2')->get();
        return view('banghay.gradetwo', compact('datas'));
    }

    public function gradethree()
    {
        $datas = Banghay::where('gradelevel', 'Grade 3')->get();
        return view('banghay.gradethree', compact('datas'));
    }

    public function gradefour()
    {
        $datas = Banghay::where('gradelevel', 'Grade 4')->get();
        return view('banghay.gradefour', compact('datas'));
    }

    public function gradefive()
    {
        $datas = Banghay::where('gradelevel', 'Grade 5')->get();
        return view('banghay.gradefive', compact('datas'));
    }

    public function gradesix()
    {
        $datas = Banghay::where('gradelevel', 'Grade 6')->get();
        return view('banghay.gradesix', compact('datas'));
    }
}
