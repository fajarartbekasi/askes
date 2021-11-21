<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DaftarController extends Controller
{
    public function create()
    {
        $roles = Role::all();

        return view('auth.register', compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'password'  => 'required',
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        if ($user = User::create($request->except('roles'))) {
            $user->syncRoles($request->get('roles'));
            flash()->success('Selamat akun anda berhasil dibuat silahkan login');
        } else {
            flash()->error('Tidak dapat menambahkan akun baru');
        }


        return redirect()->route('login');
    }
}
