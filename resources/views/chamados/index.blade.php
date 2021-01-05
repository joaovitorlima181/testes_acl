@extends('layout')

@section('cabecalho')
    Chamados
@endsection

@section('conteudo')

    <ul class="list-group">

       @can('chamados-create')
            <a href="{{route('chamados.create')}}" class="btn btn-dark mb-2">Abrir Chamado</a>
       @endcan

       @can('chamados-view')

        @forelse ($chamados as $chamado)
            <li class="list-group-item">
                <div>
                    {{ $chamado->title }}
                    
                    <div class="d-flex justify-content-end">
                    
                        <form action="{{route('chamados.destroy',$chamado->id)}}" method="post"> 
                           
                            <a title="Visualizar" class="mr-2 btn btn-primary" href="{{ route('chamados.show',$chamado->id) }}">Visualizar</a>

                            @can('chamados-delete')
                                @method('DELETE')
                                @csrf
                                <button title="Deletar" class="btn red"><button class="mr-2 btn btn-danger">Deletar</button></button>
                            @endcan                            

                        </form>
                    </div>
                </div>
            </li>

            @empty
            <h2>Nenhum Chamado.</h2>
        
        @endforelse
        
       @endcan
        
    </ul>

@endsection
