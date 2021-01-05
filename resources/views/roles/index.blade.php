@extends('layout')

@section('cabecalho')
    Papéis
@endsection

@section('conteudo')

<div class="container">
    <h2 class="center">Lista de Papéis</h2>

    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>

                    <td>

                        <form action="{{route('roles.destroy',$role->id)}}" method="post">

                            <a title="Editar" class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                            <a title="Permissões" class="btn btn-warning" href="{{route('roles.permission',$role->id)}}">Permissões</a>

                                @method('DELETE')
                                @csrf
                                <button title="Deletar" class="btn btn-danger">Deletar</i></button>

                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="row">
        @can('papel-create')
        <a class="btn blue" href="{{route('roles.create')}}">Adicionar</a>
        @endcan
    </div>
</div>
@endsection
