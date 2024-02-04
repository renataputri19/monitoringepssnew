<?php

namespace App\Http\Controllers;

use App\Models\IndikatorApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndikatorApprovalController extends Controller
{
    public function approve(Request $request)
    {
        if (Auth::user()->admin) {
            $request->validate([
                'indikator' => 'required|string',
                'domain' => 'required|string',
                'aspek' => 'required|string',
                'tingkat' => 'required|integer',
                'disetujui' => 'required|boolean',
                'reason' => 'nullable|string',
            ]);
    
            IndikatorApproval::updateOrCreate(
                [
                    'domain' => $request->domain,
                    'aspek' => $request->aspek,
                    'indikator' => $request->indikator,
                ],
                [
                    'tingkat' => $request->tingkat,
                    'disetujui' => $request->disetujui,
                    'reason' => $request->reason,
                ]
            );
    
            return back()->with('success', 'Indikator has been updated.');
        }
    
        return back()->with('error', 'Unauthorized action.');
    }
    
}
