<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
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
        $types = Type::orderBy('nombre')
        ->where('nombre', 'LIKE', "%$request->nombre%")
        ->paginate(3);
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
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
            'nombre' => ['required', 'string', 'min:2', 'max:100'],
            'descripcion' => ['required', 'min:10', 'max:10000'],
        ]);
        try {
            $type = new Type();
            $type->nombre = ucwords($request->nombre);
            $type->descripcion = ucfirst($request->descripcion);

            $type->save();

            return redirect()->route('types.index')->with('mensaje', "Categoria Creado");
        } catch (\Exception $ex) {
            return redirect()->route('types.index')->with('error', "No se ha podido crear la Categoria. Error tipo: " . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('types.detalles',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:2', 'max:100'],
            'descripcion' => ['required', 'min:10', 'max:10000']
        ]);

        try {
            $type->update([
                'nombre' => ucwords($request->nombre),
                'descripcion' => ucfirst($request->descripcion),
            ]);

            return redirect()->route('types.index')->with('mensaje', "Actualizado Correctamente");
        } catch (\Exception $ex) {
            return redirect()->route('types.index')->with('error', "Error al actualizar la Categoria. " . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        try {
            $type->delete();
            return redirect()->route('types.index')->with('mensaje', "Categoria Borrado");
        } catch (\Exception $ex) {
            return redirect()->route('types.index')->with('error', "No se ha podido borrar: " . $ex->getMessage());
        }
    }
}
