<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('EsSuperAdmin')->only('todos');
        $this->middleware(['auth', 'verified'])->only(['index','edit', 'editv2', 'update', 'updatev2']);
    }
    public function index()
    {
        return view('users.index');
    }

    public function edit()
    {
        $role=Role::orderby('nombre_rol')->get();
        return view('users.edit', compact('role'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        try {
            $user=User::find($id);

            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);

            if ($request->has('foto')) {
                $request->validate([
                    'foto' => ['image']
                ]);

                if (basename($user->foto) != 'user_default.jpg') {
                    unlink($user->foto);
                }

                $fileImagen = $request->file('foto');
                $nombreFoto = "img/users/" . uniqid() . '_' . $fileImagen->getClientOriginalName();
                Storage::Disk('public')->put($nombreFoto, \File::get($fileImagen));
                $user->foto = "storage/" . $nombreFoto;

                $user->update([
                    'foto' => 'storage/' . $nombreFoto
                ]);
            }

            return redirect()->route('perfil')->with('mensaje', "Actualizado Correctamente");
        } catch (\Exception $ex) {
            return redirect()->route('perfil')->with('error', "Error al actualizar el Perfil. " . $ex->getMessage());
        }
    }

    public function editv2($id)
    {
        $role=Role::orderby('nombre_rol')->get();
        return view('users.edit2', compact('role', 'id'));
    }

    public function updatev2(User $user, Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
        ]);
        try {
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'role_id'=>$request->rol_id
            ]);

            return redirect()->route('perfil.todos')->with('mensaje', "Actualizado Correctamente");
        } catch (\Exception $ex) {
            return redirect()->route('perfil.todos')->with('error', "Error al actualizar el Perfil. " . $ex->getMessage());
        }
    }


    public function todos()
    {
        $users=User::orderby('id')->paginate(4);
        return view('users.todos', compact('users'));
    }
}
