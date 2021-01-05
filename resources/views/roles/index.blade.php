@extends('layout')

@section('cabecalho')
    Papéis
@endsection

@section('conteudo')

<div class="container">
    <h2 class="center">Lista de Papéis</h2>

    @can('role-view')
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

                        @can('role-edit')
                            <form action="{{route('roles.destroy',$role->id)}}" method="post">

                                <a title="Editar" class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                <a title="Permissões" class="btn btn-warning" href="{{route('roles.permission',$role->id)}}">Permissões</a>

                                    @can('roles-delete')
                                        @method('DELETE')
                                        @csrf
                                        <button title="Deletar" class="btn btn-danger">Deletar</i></button>
                                    @endcan

                            </form>
                        @endcan

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    @endcan

   @can('roles-create')
    <div class="row">
        <a class="btn btn-primary mt-3" href="{{route('roles.create')}}">Adicionar</a>
    </div>
   @endcan  

</div>
@endsection
