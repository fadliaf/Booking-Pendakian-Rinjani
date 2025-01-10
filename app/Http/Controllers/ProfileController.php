<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update user information
        $user->fill($request->only([
            'name',
            'email',
            'alamat',
            'jenis_kelamin',
            'jenis_identitas',
            'no_identitas',
            'no_hp',
        ]));

        // Handle email changes and reset email verification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Handle file upload for foto_identitas
        if ($request->hasFile('foto_identitas')) {
            // Delete old file if exists
            if ($user->foto_identitas) {
                Storage::delete($user->foto_identitas);
            }

            // Store new file and update path
            $path = $request->file('foto_identitas')->store('identitas');
            $user->foto_identitas = $path;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Delete the user's file if exists
        if ($user->foto_identitas) {
            Storage::delete($user->foto_identitas);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
