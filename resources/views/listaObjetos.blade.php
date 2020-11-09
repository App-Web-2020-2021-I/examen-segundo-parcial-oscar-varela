@extends('layouts.ap')

@section('title')
       lista objetos
@endsection(title)

@section('content')
    <h3 class="bg-success">Piezas</h3>

    <a href=" piezas/create" class="bg-white"> <button class="btn btn-outline-dark bg-info col-12" type="submit" >Agregar</button></a>


    <table class="table">
                    <thead>
                        <tr  class="bg-primary">
                            <th scope="col">Nombre</th>
                            <th scope="col">descripcion</th>
                            <th scope="col">cantidad</th>
                            <th scope="col">precio</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                      @foreach($piesas as $item) 
                      <tr>
                          <td ><a href="piezas/{{$item->id}}/edit">{{$item->nombre}}</a></td>
                          <td >{{$item->descripcion}}</td>
                          <td >{{$item->numero}}</td>   
                          <td >{{$item->costo}}</td>

                          <form action="/piezas/{{$item->id}}" method="POST">
                @csrf
                @method('DELETE')
                <td ><button class="btn btn-outline-dark bg-danger" type="submit">X</button></td>
                           </form>
                        </tr>
                        @endforeach
                            
                    </tbody>
                </table>

@endsection

