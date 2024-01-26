<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    // Method to display the form
    public function showUploadForm()
    {
        return view('upload'); // This will be your Blade file with the form
    }
    
    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string', // Add validation for the title if it's required
            'files.*' => 'required|file',
        ]);

        foreach ($request->file('files') as $index => $file) {
            $filename = $file->store('files', 'public'); // Stores file in the 'storage/app/public/files' directory

            // Retrieve the title for each file from the request, assuming you have corresponding title input fields
            $title = $request->input('titles')[$index];

            File::create([
                'title' => $title, // Use the retrieved title here
                'filename' => $filename,
            ]);
        }

        return back()->with('success', 'Files have been uploaded successfully');
    }
}

