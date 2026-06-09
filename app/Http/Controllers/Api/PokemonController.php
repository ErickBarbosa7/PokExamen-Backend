<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Pokemon;

// Código del controlador




class PokemonController extends Controller
{
    public function index(Request $request)
    {
        $rows = (int)$request->input('rows',10);
        $page = 1 + (int)$request->input('page',0);

        \Illuminate\Pagination\Paginator::currentPageResolver(function() use ($page) {
            return $page;
        });
        

        $pokemones = Pokemon::paginate($rows);
        return response()->json([
            'estatus' => 1,
            'data' => $pokemones->items(),
            'total' => $pokemones->total()
        ]);
}

    



public function create(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:255',
        'tipo' => 'required|string',
        'nivel' => 'required|integer|min:1',
        'puntos_de_salud' => 'required|integer',
        'ataque' => 'required|integer',
        'defensa' => 'required|integer',
        'velocidad' => 'required|integer',
        'url' => 'required|url',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'estatus' => 0,
            'mensaje' => $validator->errors()
        ]); 
    }

    // $id_user = auth()->user()->id;

    $pokemon = new Pokemon();
    $pokemon->nombre = $request->nombre;
    $pokemon->tipo = $request->tipo; 
    $pokemon->nivel = $request->nivel;
    $pokemon->puntos_de_salud = $request->puntos_de_salud;
    $pokemon->ataque = $request->ataque;
    $pokemon->defensa = $request->defensa;
    $pokemon->velocidad = $request->velocidad;
    $pokemon->url = $request->url;
    $pokemon->eliminado = 0; 
    $pokemon->save();

    return response()->json([
        'estatus' => 1,
        'mensaje' => 'Pokemon registrado'
    ]);
}

/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $pokemon = Pokemon::find($id);
        if (!$pokemon) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => 'Pokemon no encontrado'
            ]);
        }

        return response()->json([
            'estatus' => 1,
            'data' => $pokemon
        ]);    }


        public function edit(string $id)
        {
            //
        }


        public function update(Request $request, string $id)
        {
            $validator = Validator::make($request->all(), [
                'nombre' => 'sometimes|required|string|max:255',
                'tipo' => 'sometimes|required|string',
                'nivel' => 'sometimes|required|integer|min:1',
                'puntos_de_salud' => 'sometimes|required|integer|min:1',
                'ataque' => 'sometimes|required|integer|min:1',
                'defensa' => 'sometimes|required|integer|min:1',
                'velocidad' => 'sometimes|required|integer|min:1',
                'url' => 'sometimes|required|url',
            ]);
            
        
            if ($validator->fails()) {
                return response()->json([
                    'estatus' => 0,
                    'mensaje' => $validator->errors()
                ]);
            }
        
            $pokemon = Pokemon::find($id);
        
            if (!$pokemon) {
                return response()->json([
                    'estatus' => 0,
                    'mensaje' => 'Pokémon no encontrado'
                ]);
            }
        
            $pokemon->nombre = $request->nombre ?? $pokemon->nombre;
            $pokemon->tipo = $request->tipo ?? $pokemon->tipo;
            $pokemon->nivel = $request->nivel ?? $pokemon->nivel;
            $pokemon->puntos_de_salud = $request->puntos_de_salud ?? $pokemon->puntos_de_salud;
            $pokemon->ataque = $request->ataque ?? $pokemon->ataque;
            $pokemon->defensa = $request->defensa ?? $pokemon->defensa;
            $pokemon->velocidad = $request->velocidad ?? $pokemon->velocidad;
            $pokemon->url = $request->url ?? $pokemon->url;
        
            $pokemon->save();
        
            // Retornar una respuesta de éxito
            return response()->json([
                'estatus' => 1,
                'mensaje' => 'Pokémon actualizado exitosamente'
            ]);
        }
        


    public function destroy(string $id)
    {
        $pokemon = Pokemon::find($id);

        if (!$pokemon) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => 'Producto no encontrado'
            ]);
        }

        $pokemon->delete();

        return response()->json([
            'estatus' => 1,
            'mensaje' => 'Pokemon eliminado'
        ]);    }
}
