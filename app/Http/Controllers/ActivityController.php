<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('EsAdmin')->only([['edit', 'update', 'create', 'destroy', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activities = Activity::orderBy('titulo')
        ->where('titulo', 'LIKE', "%$request->titulo%")
        ->where('lugar', 'LIKE', "%$request->lugar%")
        ->paginate(3);
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'min:2', 'max:100'],
            'contenido' => ['required', 'min:10'],
            'lugar' => ['min:0', 'max:120']
        ]);

        try {
            $activity = new Activity();
            $activity->titulo = ucwords($request->titulo);
            dd($request->conteido);
            $activity->contenido = base64_encode($request->contenido);
            $activity->lugar = $request->lugar;
            $activity->user_id=Auth::user()->id;

            if ($request->has('foto')) {

                $request->validate([
                    'foto' => ['image']
                ]);

                $fileImagen = $request->file('foto');
                $nombreFoto = "img/activities/".uniqid().'_'.$fileImagen->getClientOriginalName();
                Storage::Disk('public')->put($nombreFoto, \File::get($fileImagen));
                $activity->foto = "storage/".$nombreFoto;

            }

            $activity->save();


            return redirect()->route('activities.index')->with('mensaje', "Actividad Creado");
        } catch (\Exception $ex) {
            return redirect()->route('activities.index')->with('error', "No se ha podido crear la Actividad. Error tipo: " . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        $activities=Activity::where('lugar', $activity->lugar)->where('id', '!=', $activity->id)->orderby('titulo')->paginate(3);
        return view('activities.detalles', compact('activity', 'activities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'min:2', 'max:100'],
            'contenido' => ['required', 'min:10'],
            'lugar' => ['min:0', 'max:120']
        ]);

        try {
            $activity->update([
                'titulo' => ucwords($request->titulo),
                'contenido' => base64_encode($request->contenido),
                'lugar' => $request->lugar,
                'user_id'=> Auth::user()->id
            ]);

            if ($request->has('foto')) {
                $request->validate([
                    'foto' => ['image']
                ]);

                if (basename($activity->foto) != 'activities.png') {
                    unlink($activity->foto);
                }

                $fileImagen = $request->file('foto');
                $nombreFoto = "img/activities/" . uniqid() . '_' . $fileImagen->getClientOriginalName();
                Storage::Disk('public')->put($nombreFoto, \File::get($fileImagen));
                $activity->foto = "storage/" . $nombreFoto;

                $activity->update([
                    'foto' => 'storage/' . $nombreFoto
                ]);
            }

            return redirect()->route('activities.index')->with('mensaje', "Actualizado Correctamente");
        } catch (\Exception $ex) {
            return redirect()->route('activities.index')->with('error', "Error al actualizar el Juego. " . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        try {
            if (basename($activity->foto) != 'activities.png') {
                unlink($activity->foto);
            }

            $activity->delete();
            return redirect()->route('activities.index')->with('mensaje', "Actividad Borrado");
        } catch (\Exception $ex) {
            return redirect()->route('activities.index')->with('error', "No se ha podido borrar: " . $ex->getMessage());
        }
    }
}
