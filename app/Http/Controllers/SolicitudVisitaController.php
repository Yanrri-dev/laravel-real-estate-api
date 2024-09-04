<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudVisita;
use Validator;

class SolicitudVisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $solicitud_visitas = SolicitudVisita::with('persona', 'propiedad')->paginate();

        return response()->json($solicitud_visitas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'persona_id' => 'required|exists:personas,id',
            'propiedad_id' => 'required|exists:propiedades,id',
            'fecha_visita' => 'required|date',
            'comentarios' => 'max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $solicitud_visita = SolicitudVisita::create($request->all());

        return response()->json(['message' => 'Solicitud de visita creada', 'solicitud_visita' => $solicitud_visita], 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $solicitud_visita = SolicitudVisita::with('persona', 'propiedad')->find($id);

        if (is_null($solicitud_visita)) {
            return response()->json(['message' => 'Solicitud de visita no encontrada'], 404);
        }

        return response()->json($solicitud_visita);


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

        $solicitud_visita = SolicitudVisita::find($id);

        if (is_null($solicitud_visita)) {
            return response()->json(['message' => 'Solicitud de visita no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'persona_id' => 'sometimes|required|exists:personas,id',
            'propiedad_id' => 'sometimes|required|exists:propiedades,id',
            'fecha_visita' => 'sometimes|required|date',
            'comentarios' => 'max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $solicitud_visita->update($request->all());

        return response()->json(['message' => 'Solicitud de visita actualizada', 'solicitud_visita' => $solicitud_visita], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $solicitud_visita = SolicitudVisita::find($id);

        if (is_null($solicitud_visita)) {
            return response()->json(['message' => 'Solicitud de visita no encontrada'], 404);
        }

        $solicitud_visita->delete();

        return response()->json(['message' => 'Solicitud de visita eliminada'], 200);


    }
}
