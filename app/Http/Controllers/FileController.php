<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; // Use Auth facade

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        
        

        
        $request->validate([
            'files.*' => 'required|file|mimes:pdf|max:3072', // mimes:pdf ensures only PDF files are accepted and max:3072 limits the size to 3MB
        ]);

        
    
        // Get the hidden fields
        $domain = $request->input('domain');
        $aspek = $request->input('aspek');
        $indikator = $request->input('indikator');
        $tingkat = $request->input('tingkat');
        $disetujui = $request->input('disetujui');
    
        foreach ($request->file('files') as $file) {
            // Use getClientOriginalName() to get the real name of the file
            $filenameWithExtension = $file->getClientOriginalName();
    
            // Store the file in the 'storage/app/public/files' directory with the original name
            $path = $file->storeAs('files', $filenameWithExtension, 'public');
    
            File::create([
                'domain' => $domain,
                'aspek' => $aspek,
                'indikator' => $indikator,
                'tingkat' => $tingkat,
                'disetujui' => $disetujui,
                'filename' => $path, // This will save the path with the original file name
            ]);
        }
    
        return back()->with('success', 'Files have been uploaded successfully');
    }
    

    public function approve(Request $request, $id)
    {
        if (Auth::user()->admin) {
            $file = File::findOrFail($id);
            $file->disetujui = true;
            $file->reason = $request->input('reason', null); // Store the reason
            $file->save();
    
            return back()->with('success', 'File has been approved.');
        }
    
        return back()->with('error', 'Aksi tidak diizinkan.');
    }
    
    public function disapprove(Request $request, $id)
    {
    if (Auth::user()->admin) {
        $file = File::findOrFail($id);
        $file->disetujui = false;
        $file->reason = $request->input('reason'); // Store the reason
        $file->save();

        return back()->with('success', 'File disapproval has been recorded.');
        }
    
        return back()->with('error', 'Aksi tidak diizinkan.');
    }
    
    public function destroy($id)
    {
        // Add authorization check if necessary to ensure only allowed users can delete
        
        // Delete the file from storage
        $file = File::findOrFail($id);

        // Delete the file record from the database
        Storage::delete('public/' . $file->filename);
        $file->delete();

        return back()->with('success', 'File deleted successfully.');
    }

}

