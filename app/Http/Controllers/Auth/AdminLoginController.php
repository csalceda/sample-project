<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validate the form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If login successful redirect to intended route
            return redirect()->intended(route('admin.index'));
        }

        // If not redirect to login page with error
        // return redirect()->back()->withInput($request->only('email', 'remember'));
        return "NO";
    }
}
