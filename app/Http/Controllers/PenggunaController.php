<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class PenggunaController extends Controller
{
    public function index(){
        return view("pengguna.index",[
            'data_pengguna' => User::get(),
        ]);
    }
    public function edit(String $pengguna){
        $user = User::find($pengguna);
        return view('pengguna.edit',[
            'user' => $user,
        ]);
    }
    //Update
    public function update(Request $request,String $pengguna){
        $user = User::find($pengguna);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('pengguna.index')->with('success', 'Akses pengguna berhasil di update');
    }
}
