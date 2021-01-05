@extends('layout')

@section('cabecalho')
    {{$role->name}}
@endsection

@section('conteudo')
    
    <form action="{{route('roles.update', $role)}}" method="post">

        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="">Título: </label>
            <input type="text" name="name" class="form-control" value="{{$role->name}}">
        </div>

        <div class="form-group mb-5">
            <label for="">Descrição: </label>
            <input type="text" name="description" class="form-control" value="{{$role->description}}">
        </div>

        <button class="btn btn-success mb-2">Salvar</button>
    </form>

        

    <div>       
            <form action="{{route('roles.destroy',$role->id)}}" method="post"> 
                @method('DELETE')
                @csrf
                <button title="Deletar" class="btn red"><button class="mr-2 btn btn-danger">Deletar</button></button>
            </form>
        
    </div>
    
@endsection