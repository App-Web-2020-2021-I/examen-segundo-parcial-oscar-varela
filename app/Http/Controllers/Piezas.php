<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Piezas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $piesas = DB::select('SELECT * FROM piesas');

         return view('listaObjetos' , compact('piesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // 

       return view('nuevoRegistro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $nombre = $request->nombre;
        if($nombre == "") {
            $error = "nombre vacío";

            return view('nuevoRegistro', compact('error'));
        }

        $descripcion = $request->descripcion;
        if($descripcion == "") {
            $error = "descripcion vacía";

            return view('nuevoRegistro', compact('error'));
        }

        $numero = $request->numero;
        if($numero == 0) {
            $error = "numero vacío";

            return view('nuevoRegistro', compact('error'));
        }

        $costo = $request->costo;
        if($costo == 0) {
            $error = "costo vacío";

            return view('nuevoRegistro', compact('error'));
        }

        DB::insert('INSERT INTO piesas(nombre, descripcion, numero, costo) VALUES(?, ?, ?, ?)', [$nombre,$descripcion,$numero, $costo]);

        return redirect()->route('piezas.index');
/*
        return $request;*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $title = 'piezas';
        return view("listaObjetos", compact('id','title')) ;
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
        $piesas = DB::select('SELECT * FROM piesas WHERE id = ?',[$id]);

        $item = $piesas[0];

        $error = "";
         return view('actualizacion' , compact('error' , 'item'));
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
        //
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        DB::delete('DELETE FROM piesas WHERE id = ?', [$id]);

        return redirect()->route('piezas.index');
    }


}
 