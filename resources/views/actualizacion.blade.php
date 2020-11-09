@extends('layouts.ap')

@section('title')
      nuevo registro
@endsection(title)

@section('content')

    <h3>Crear categoría</h3>

   
  

  
    <form action="piezas/{{$item->id}}" class="form-row" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group col-9">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$item->nombre}}">
        </div>

        <div class="form-group col-9">
            <label for="descripcion">descripcion</label>
            <input type="text" name="descripcion" class="form-control" value="{{$item->descripcion}}">
        </div>

        <div class="form-group col-4">
            <label for="numero">cantidad</label>
            <input type="number" name="numero" class="form-control" value="{{$item->numero}}" >
        </div>

        <div class="form-group col-4">
            <label for="costo">costo por pieza</label>
            <input type="number" step="0.01" name="costo" class="form-control" value="{{$item->costo}}">
        </div>

        <div class="col-12 text-center">
            <button class="btn btn-success" type="submit">Guardar nuevo</button>
        </div>
    </form>