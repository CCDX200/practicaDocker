<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\User;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function verLibros()
    {
        //
        $libros = Libros::all();
        return $libros;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function crearLibro(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:50',
            'sinopsis' => 'nullable|string',
            'isbn' => 'required|string|max:13',
            'editorial' => 'nullable|string|max:100',
        ]);
    

        $libro = Libros::create([
            'titulo' => $request->titulo,
            'genero' => $request->genero,
            'sinopsis' => $request->sinopsis,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial,
            'editorial' => $request->editorial,
            'user_id' => $request->user_id
        ]);
    
        return response()->json(['message' => 'Libro creado exitosamente', 'book' => $libro], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function libroEspecifico(Request $request)
    {
        //
        $libro = Libros::find($request -> id);
        return response()->json(['message' => 'Libro encontrado exitosamente', 'book' => $libro], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function libroEditar(Request $request)
    {
        $libro = Libros::findOrFail($request -> id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:50',
            'sinopsis' => 'nullable|string',
            'isbn' => 'required|string|max:13',
            'editorial' => 'nullable|string|max:100',
        ]);

        $libro->update($request->only(['titulo', 'genero', 'sinopsis', 'isbn', 'editorial']));

        return response()->json(['message' => 'Libro actualizado exitosamente', 'libro' => $libro]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminarLibro(Request $request)
    {
        $book = Libros::findOrFail($request -> id);
        $book->delete();
        return response()->json(['message' => 'Libro eliminado exitosamente']);
    }

    public function eliminarUsuario(Request $request)
    {
        $user = User::findOrFail($request->id);

        foreach ($user->libros as $libro) {
            $libro->delete();
        }

        $user->delete();

        return response()->json(['message' => 'Usuario y sus libros eliminados exitosamente']);
    }

    public function crearUsuario(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users,email'],
            'password' => ['nullable', 'string', 'min:8'],
            'phone' => ['nullable', 'string', 'max:15', 'regex:/^\+?[0-9]{7,15}$/'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
        ]);
        return response()->json(['message' => 'Usuario creado exitosamente', "Nuevo Usuario: "=>$user]);
    }

    public function verUsuarios(){
        $user = User::all();
        return $user;
    }
}
