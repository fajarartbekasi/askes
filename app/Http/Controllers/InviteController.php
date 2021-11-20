<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
       return view('invite.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();

        return view('invite.create', compact('roles'));
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
            flash()->success('Anggota baru berhasil ditambahkan');
        } else {
            flash()->error('Tidak dapat menambahkan pengguna baru');
        }


        return redirect()->route('invite');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('invite.edit', compact('user', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'password'  => 'required',
        ]);

        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'password'));

        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $this->syncPermissions($request, $user);

        $user->save();

        flash()->success('Anggota berhasil di update');

        return redirect()->route('invite');
    }
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->delete($request->all());

        flash()->success('Anggota berhasil di hapus');

        return redirect()->route('invite');
    }
    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }
}
