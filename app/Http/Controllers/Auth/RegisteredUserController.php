<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'social_link' => ['required', 'url', 'max:100'],
            'cover_letter' => ['string', 'max:500'],
            'resume' => ['required', 'mimes:pdf', 'max:10000'],
        ]);
        $resume = $request->file('resume');
        // Saving the file in the resumes folder
        $resume_path = $request->file('resume')->store('resumes');
        //dd($request);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'social_url' => $request->social_link,
            'cover_letter' => $request->cover_letter,
            'resume_path' => $resume_path,
            'application_status' => 'Pending_review',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $request->session()->forget('user_id', $user->id);

        //return redirect(RouteServiceProvider::HOME);
        return View('dashboard');
    }
}
