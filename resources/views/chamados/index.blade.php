@extends('layout')

@section('cabecalho')
    Chamados
@endsection

@section('conteudo')

    <ul class="list-group">

        <a href="{{route('chamados.create')}}" class="btn btn-dark mb-2">Abrir Chamado</a>

        @forelse ($chamados as $chamado)
            <li class="list-group-item">
                <div>
                    <span class="d-flex justify-content-start fs-3 align-middle" id="tituloChamado-{{ $chamado->id }}">{{ $chamado->title }}</span>
                    
                    <div class="d-flex justify-content-end">
                        <a title="Visualizar" class="btn orange" href="{{ route('chamados.show',$chamado->id) }}"><button class="mr-2 btn btn-primary">Visualizar</button></a>
                        
                        <form action="{{route('chamados.destroy',$chamado->id)}}" method="post"> 
                            @method('DELETE')
                            @csrf
                            <button title="Deletar" class="btn red"><button class="mr-2 btn btn-danger">Deletar</button></button>
                        </form>
                    </div>
                </div>
            </li>

            @empty
            <h2>Nenhum Chamado.</h2>
            
        @endforelse
        
    </ul>

@endsection
