<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'alamat' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],  
            'jenis_identitas' => ['required', 'string', 'max:50'],  
            'no_identitas' => ['required', 'string', 'max:50'],
            'no_hp' => ['required', 'string', 'max:20'],
            'foto_identitas' => ['required', 'file', 'image', 'max:2048'],  
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $fotoIdentitas = null;
        if ($request->hasFile('foto_identitas')) {
            $fotoIdentitas = $request->file('foto_identitas');
            $namaFile = uniqid() . '.' . $fotoIdentitas->getClientOriginalExtension();
            $path = $fotoIdentitas->storeAs('identitas', $namaFile, 'public');
        }
        
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'role' => 'User',
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_identitas' => $request->jenis_identitas,
            'no_identitas' => $request->no_identitas,
            'no_hp' => $request->no_hp,
            'foto_identitas' => $namaFile,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
