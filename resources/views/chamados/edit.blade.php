@extends('layout')

@section('cabecalho')
    {{$chamado->title}}
@endsection

@section('conteudo')

    <div class="form-group">
        <label for="">Título: </label>
        <input type="text" name="titleChamado" class="form-control" value="{{$chamado->description}}">
    </div>

    <div class="form-group">
        <label for="">Descrição: </label>
        <input type="text" name="descriptionChamado" class="form-control" value="{{$chamado->description}}">
    </div>
    
@endsection