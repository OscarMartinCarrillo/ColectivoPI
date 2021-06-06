<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;

class GameController extends Controller
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
        if ($request->type_id == "Categoria" || $request->type_id == null) {
            $games = Game::orderBy('nombre')
                ->where('nombre', 'LIKE', "%$request->nombre%")
                ->where('descripcion', 'LIKE', "%$request->descripcion%")
                ->paginate(9);
        } else {
            $games = Game::orderBy('nombre')
                ->where('nombre', 'LIKE', "%$request->nombre%")
                ->where('descripcion', 'LIKE', "%$request->descripcion%")
                ->where('type_id', $request->type_id)
                ->paginate(9);
        }

        $types = Type::orderby('nombre')->get();

        return view('games.index', compact('games', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderby('nombre')->get();
        return view('games.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->maxduracion == null) {
            $request->maxduracion = $request->minduracion;
        } elseif ($request->minduracion > $request->maxduracion) {
            return redirect()->route('games.index')->with('error', "No se ha podido crear el Juego. Intentelo de nuevo revisando la duración.");
        }

        if ($request->maxjugadores == null) {
            $request->maxjugadores = $request->minjugadores;
        } elseif ($request->minjugadores > $request->maxjugadores) {
            return redirect()->route('games.index')->with('error', "No se ha podido crear el Juego. Intentelo de nuevo revisando la cantidad de Jugadores.");
        }

        $request->validate([
            'nombre' => ['required', 'string', 'min:2', 'max:100'],
            'descripcion' => ['required', 'min:10', 'max:1000'],
            'dificultad' => ['required'],
            'minduracion' => ['required', 'numeric', 'min:0', 'max:600'],
            'edad' => ['required', 'numeric', 'min:0', 'max:100'],
            'minjugadores' => ['required', 'numeric', 'min:1'],
            'type_id' => ['required']
        ]);
        try {
            $game = new Game();
            $game->nombre = ucwords($request->nombre);
            $game->descripcion = ucfirst($request->descripcion);
            $game->minduracion = $request->minduracion;
            $game->maxduracion = $request->maxduracion;
            $game->minjugadores = $request->minjugadores;
            $game->maxjugadores = $request->maxjugadores;
            $game->dificultad = $request->dificultad;
            $game->edad = $request->edad;
            $game->type_id = $request->type_id;

            if ($request->has('foto')) {
                $request->validate([
                    'foto' => ['image']
                ]);

                $fileImagen = $request->file('foto');
                $nombreFoto = "img/games/" . uniqid() . '_' . $fileImagen->getClientOriginalName();
                Storage::Disk('public')->put($nombreFoto, \File::get($fileImagen));
                $game->foto = "storage/" . $nombreFoto;
            }

            $game->save();


            return redirect()->route('games.index')->with('mensaje', "Juego Creado");
        } catch (\Exception $ex) {
            return redirect()->route('games.index')->with('error', "No se ha podido crear el Juego. Error tipo: " . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $games = Game::where('type_id', $game->type_id)->where('id', '!=', $game->id)->orderby('nombre')->paginate(3);
        return view('games.detalles', compact('game', 'games'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $types = Type::orderby('nombre')->get();
        return view('games.edit', compact('game', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        if ($request->maxduracion == null) {
            $request->maxduracion = $request->minduracion;
        } elseif ($request->minduracion > $request->maxduracion) {
            return redirect()->route('games.index')->with('error', "No se ha podido crear el Juego. Intentelo de nuevo revisando la duración.");
        }

        if ($request->maxjugadores == null) {
            $request->maxjugadores = $request->minjugadores;
        } elseif ($request->minjugadores > $request->maxjugadores) {
            return redirect()->route('games.index')->with('error', "No se ha podido crear el Juego. Intentelo de nuevo revisando la cantidad de Jugadores.");
        }

        $request->validate([
            'nombre' => ['required', 'string', 'min:2', 'max:100'],
            'descripcion' => ['required', 'min:10', 'max:1000'],
            'dificultad' => ['required'],
            'minduracion' => ['required', 'numeric', 'min:0', 'max:600'],
            'edad' => ['required', 'numeric', 'min:0', 'max:100'],
            'minjugadores' => ['required', 'numeric', 'min:1']
        ]);

        try {
            $game->update([
                'nombre' => ucwords($request->nombre),
                'descripcion' => ucfirst($request->descripcion),
                'dificultad' => $request->dificultad,
                'minduracion' => $request->minduracion,
                'maxduracion' => $request->maxduracion,
                'edad' => $request->edad,
                'dificultad' => $request->dificultad,
                'minjugadores' => $request->minjugadores,
                'maxjugadores' => $request->maxjugadores
            ]);

            if ($request->has('foto')) {
                $request->validate([
                    'foto' => ['image']
                ]);

                if (basename($game->foto) != 'default.jpg') {
                    unlink($game->foto);
                }

                $fileImagen = $request->file('foto');
                $nombreFoto = "img/games/" . uniqid() . '_' . $fileImagen->getClientOriginalName();
                Storage::Disk('public')->put($nombreFoto, \File::get($fileImagen));
                $game->foto = "storage/" . $nombreFoto;

                $game->update([
                    'foto' => 'storage/' . $nombreFoto
                ]);
            }

            return redirect()->route('games.index')->with('mensaje', "Actualizado Correctamente");
        } catch (\Exception $ex) {
            return redirect()->route('games.index')->with('error', "Error al actualizar el Juego. " . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        try {
            if (basename($game->foto) != 'default.jpg') {
                unlink($game->foto);
            }

            $game->delete();
            return redirect()->route('games.index')->with('mensaje', "Juego Borrado");
        } catch (\Exception $ex) {
            return redirect()->route('games.index')->with('error', "No se ha podido borrar: " . $ex->getMessage());
        }
    }
}
