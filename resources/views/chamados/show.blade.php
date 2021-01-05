@extends('layout')

@section('cabecalho')
    {{$chamado->title}}
@endsection

@section('conteudo')
    
    <form action="{{route('chamados.update', $chamado)}}" method="post">

        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="">Título: </label>
            <input type="text" name="titleChamado" class="form-control" value="{{$chamado->title}}">
        </div>

        <div class="form-group mb-5">
            <label for="">Descrição: </label>
            <input type="text" name="descriptionChamado" class="form-control" value="{{$chamado->description}}">
        </div>

        @can('chamados-edit')
            <button class="btn btn-success mb-2">Salvar</button>
        @endcan
    </form>

    <div>  

        @can('chamados-delete')
            <form action="{{route('chamados.destroy',$chamado->id)}}" method="post"> 
                @method('DELETE')
                @csrf
                <button title="Deletar" class="btn red"><button class="mr-2 btn btn-danger">Deletar</button></button>
            </form>
        @endcan

    </div>
    
@endsection