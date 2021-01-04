@extends('layout')

@section('cabecalho')
    {{$user->name}}
@endsection

@section('conteudo')

<form action="{{route('user.update', $user->id)}}" method="POST">

    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="">Name: </label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}">
    </div>

    <div class="form-group">
        <label for="">E-mail: </label>
        <input type="text" name="email" class="form-control" value="{{$user->email}}">
    </div>

    <button class="btn btn-success mb-2">Salvar</button>

</form>

<div>       
    <form action="{{route('user.destroy',$user->id)}}" method="post"> 
        @method('DELETE')
        @csrf
        <button title="Deletar" class="btn red"><button class="mr-2 btn btn-danger">Deletar</button></button>
    </form>

</div>
    
@endsection