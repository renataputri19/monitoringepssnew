<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opd;

class OpdController extends Controller
{
    public function index()
    {
        $opds = Opd::all();
        return view('list-opd', compact('opds'));
    }
    
    public function create()
    {
        // return the view for creating a new OPD
        return view('opd-create');
    }
    
    public function edit($id)
    {
        // find the OPD by id and pass it to the view
        $opd = Opd::findOrFail($id);
        return view('opd-edit', compact('opd'));
    }
    
    public function update(Request $request, $id)
    {
        $opd = Opd::findOrFail($id);
        $opd->full_name = $request->full_name;
        $opd->position = $request->position;
        $opd->institution = $request->institution;
        $opd->phone_number = $request->phone_number;
        $opd->save();

        return redirect()->route('list-opd')->with('success', 'OPD updated successfully');
    }

    public function destroy($id)
    {
        // find and delete the OPD by id
        $opd = Opd::findOrFail($id);
        $opd->delete();
        
        // redirect after delete
        return redirect()->route('list-opd')->with('success', 'OPD deleted successfully');
    }

    public function store(Request $request)
    {
        $opd = new Opd();
        $opd->full_name = $request->input('full_name');
        $opd->position = $request->input('position');
        $opd->institution = $request->input('institution');
        $opd->phone_number = $request->input('phone_number');
        $opd->save();

        return redirect()->route('list-opd')->with('success', 'OPD created successfully.');
    }
    
}
