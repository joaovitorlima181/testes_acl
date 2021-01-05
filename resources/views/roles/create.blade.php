@extends('layout')

@section('cabecalho')
    Criar Papel
@endsection
@section('conteudo')
<form action="{{route('roles.store')}}" method="post">

    @csrf
    <div class="form-group">
        <label for="">Nome: </label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group mb-5">
        <label for="">Descrição: </label>
        <input type="text" name="description" class="form-control">
    </div>

    <button class="btn btn-success mb-2">Salvar</button>
</form>
@endsection
