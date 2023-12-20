<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function show()
    {
        return "<h1>This is my first controller</h1>";
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = public_path('assets/images');
            $request->image->move($path, $file_name);
            return 'Uploaded';
        } else {
            return 'No file uploaded.';
        }
    }
}
