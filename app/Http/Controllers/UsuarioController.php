<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Muestra el listado completo de usuarios
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all('id', 'nombre', 'apellido', 'email', 'usuario');

        return response()->json($usuarios, 200);
    }

    /**
     * Guarda un usuario en la BD.
     *
     * @param  \Illuminate\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Usuario::create($request->all());

        return response(201);

    }

    /**
     * Muestra el usuario con id = $id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios=Usuario::findOrFail($id);

        return response()->json($usuarios, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validacion a traves del form request (UpdateUsuarioRequest.php)
        Usuario::find($id)->update($request->all());
        return response(201);
    }

    /**
     * Elimina el usuario con id = $id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::find($id)->delete();
        return response(200);
    }
}
