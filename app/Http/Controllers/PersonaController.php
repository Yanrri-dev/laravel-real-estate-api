<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Validator;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $nombre = $request->query('nombre');
        $email =  $request->query('email');
        $telefono = $request->query('telefono');

        $query = Persona::query();

        if($nombre) {
            $query->where('nombre', 'like', "%$nombre%");
        }

        if($email) {
            $query->where('email', 'like', "%$email%");
        }

        if($telefono) {
            $query->where('telefono', 'like', "%$telefono%");
        }

        $personas = $query->paginate();
        return response()->json($personas);

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
            'nombre' => 'required|max:128',
            'email' => 'required|email',
            'telefono' => 'required|max:32',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $persona = Persona::create($request->all());

        return response()->json(['message' => 'Persona creada', 'persona' => $persona], 201);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $persona = Persona::find($id);

        if(is_null($persona)) {
            return response()->json(['message' => 'Persona no encontrada'], 404);
        }

        return response()->json($persona);

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

        $persona = Persona::find($id);

        if(is_null($persona)) {
            return response()->json(['message' => 'Persona no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|max:128',
            'email' => 'sometimes|required|email',
            'telefono' => 'sometimes|required|max:32',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $persona->update($request->all());

        return response()->json(['message' => 'Persona actualizada', 'persona' => $persona], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $persona = Persona::find($id);

        if(is_null($persona)) {
            return response()->json(['message' => 'Persona no encontrada'], 404);
        }

        //check si la persona tiene solictudes
        if($persona->solicitudes->count() > 0) {
            return response()->json(['message' => 'No se puede eliminar la persona, tiene solicitudes asociadas'], 400);
        }

        $persona->delete();

        return response()->json(['message' => 'Persona eliminada'], 200);

    }
}
