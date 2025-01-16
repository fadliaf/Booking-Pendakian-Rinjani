<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role', 'user')->get();
        return view('admin.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);  
        return view('admin.show-user', compact('user'));  
    }

    public function destroy(User $user)
    {
        
        $user->delete();

         
        return redirect()->route('admin.index')->with('success', 'Pengguna berhasil dihapus!');
    }

}
