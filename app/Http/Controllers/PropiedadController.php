<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;
use Validator;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedad::all();

        return response()->json($propiedades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'direccion' => 'required|max:512',
            'ciudad' => 'required|max:64',
            'precio' => 'required|numeric',
            'descripcion' => 'max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $propiedad = Propiedad::create($request->all());

        return response()->json(['message' => 'Propiedad creada', 'propiedad' => $propiedad], 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $propiedad = Propiedad::find($id);

        if (is_null($propiedad)) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }

        return response()->json($propiedad, 200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $propiedad = Propiedad::find($id);

        if (is_null($propiedad)) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'direccion' => 'required|max:512',
            'ciudad' => 'required|max:64',
            'precio' => 'required|numeric',
            'descripcion' => 'max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $propiedad->update($request->all());

        return response()->json(['message', 'Propiedad actualizada', 'propiedad' => $propiedad ], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $propiedad = Propiedad::find($id);

        if (is_null($propiedad)) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }


        //check si hay solicitudes para esta propiedad
        if ($propiedad->solicitudes->count() > 0) {
            return response()->json(['message' => 'No se puede eliminar la propiedad porque tiene solicitudes asociadas'], 400);
        }

        $propiedad->delete();


        return response()->json(['message' => 'Propiedad eliminada','propiedad' => $propiedad ], '200');

    }
}
