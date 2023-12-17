<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function formSubmission(Request $request)
    {
        // Retrieve data from the request
        $email = $request->input('email');
        $password = $request->input('pwd');
        $remember = $request->has('remember'); // Checkbox value

        // Now you can do something with the data, e.g., store it in the database
        echo "Email: $email<br>";
        echo "Password: $password<br>";
        echo "Remember: " . ($remember ? 'Yes' : 'No') . "<br>";
        // exit;
        // dd([
        //     'email' => $email,
        //     'password' => $password,
        //     'remember' => $remember,
        // ]);
        // Return a response or redirect
        // return redirect()->route('logged'); // Replace 'some.route' with your desired route
    }
}
