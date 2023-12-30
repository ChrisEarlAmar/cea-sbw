<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.register');
    }

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|max:255',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image upload validation rules
        ]);

        try {
            // Handle picture upload
            if ($request->hasFile('picture')) {
                $picture = $request->file('picture');
                $fileName = Str::random(20) . '.' . $picture->getClientOriginalExtension(); // Generate a unique file name
                $picture->storeAs('public/uploads', $fileName); // Store the file in the public/uploads directory
            } else {
                $fileName = null; // No picture uploaded
            }

            // Create the user with the uploaded picture file name
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'picture' => $fileName, // Save the file name in the database
            ]);

            auth()->login($user); // Log in the user after registration

            return redirect()->route('home'); // Redirect to the home
        } catch (\Exception $e) {
            // Handle any exceptions that occur during user creation or file upload
            return back()->withInput()->withErrors(['error' => 'User registration failed.']);
        }
    }
}