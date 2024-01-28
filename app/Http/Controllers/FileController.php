<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    // Method to display the form
    // public function showUploadForm()
    // {
    //     return view('upload'); // This will be your Blade file with the form
    // }
    
    public function upload(Request $request)
    {
        $file = $request->file('file');

        // Get the hidden fields
        $domain = $request->input('domain');
        $aspek = $request->input('aspek');
        $indikator = $request->input('indikator');
        $tingkat = $request->input('tingkat');
        $disetujui = $request->input('disetujui');

        // Validate the file (optional, but recommended)
        $this->validate($request, [
            'file' => 'required|file|max:2048', // Adjust rules as needed
        ]);

        // Generate a unique filename
        $filename = $file->hashName();

        // Store the file in the desired disk and directory
        $path = $file->storeAs('public/uploads', $filename); // Adjust path as needed

        $data = new File;

        // Create a new model instance with the file information
        $data->domain = $domain;
        $data->aspek = $aspek;
        $data->indikator = $indikator;
        $data->tingkat = $tingkat;
        $data->disetujui = $disetujui;
        $data->filename = $filename;
        // $data->path = $path;

        // Save the model instance
        $data->save();

        return back()->with('success', 'Files have been uploaded successfully');
    }
}

