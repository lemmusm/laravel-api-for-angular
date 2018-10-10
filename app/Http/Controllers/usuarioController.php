<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return usuario::get();
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
        $usuario = new usuario();

        $validateData = $request -> validate([
            'uid' => 'required|unique:usuarios'
        ]);

        if (!is_null($usuario)) {
            $usuario -> username = $request -> username;
            $usuario -> email = $request -> email;
            $usuario -> urlavatar = $request -> urlavatar;
            $usuario -> uid = $request -> uid;
            $usuario -> dpto = $request -> dpto;
            $usuario -> puesto = $request -> puesto;
            $usuario -> save();

            $response = array (
                'status' => 'success',
                'code' => 200,
                'message' => 'Perfil actualizado'
            );
        } else {
            $response = array (
                'status' => 'error',
                'code' => 400,
                'message' => 'Error al guadar usuario'
            );
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return usuario::find($id);
        $response = array (
            'status' => 'success',
            'code' => 200,
            'message' => 'Datos cargados correctamente'
        );
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
    {   $usuario = new usuario();
        $usuario = usuario::where('uid', $id)->update(
                [ 
                    'dpto' => $request->get('dpto'),
                    'puesto' => $request->get('puesto')
                ]
            );

            $response = array (
                'status' => 'success',
                'code' => 200,
                'message' => 'Perfil actualizado'
            );
        
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id != null) {
            $usuario = usuario::find($id);
            $usuario -> delete();
            $response = array (
                'status' => 'success',
                'message' => 'Error al eliminar usuario'
            );
        } else {
            # code...
        }
        
    }
}
