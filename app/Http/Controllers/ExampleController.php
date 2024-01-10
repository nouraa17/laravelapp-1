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

    public function createSession()
    {
        // session()->put('testSession', 'First Laravel session');
        session()->flash('testSession', 'First Laravel session'); //session used one time
        return 'Session Created '. session('testSession');

    }
    public function deleteSession()
    {
        session()->forget('testSession');
        // session()->flush(); //delete all sessions
        return 'Session Deleted ';

    }
}
