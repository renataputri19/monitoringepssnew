<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file',
        ]);

        // Get the hidden fields
        $domain = $request->input('domain');
        $aspek = $request->input('aspek');
        $indikator = $request->input('indikator');
        $tingkat = $request->input('tingkat');
        $disetujui = $request->input('disetujui');

        foreach ($request->file('files') as $file) {
            $filename = $file->store('files', 'public'); // Stores file in the 'storage/app/public/files' directory

            File::create([
                'domain' => $domain, // You might want to pass this as another input or use the file name
                'aspek' => $aspek,
                'indikator' => $indikator,
                'tingkat' => $tingkat,
                'disetujui' => $disetujui,
                'filename' => $filename,
            ]);
        }

        

        return back()->with('success', 'Files have been uploaded successfully');
    }
}

