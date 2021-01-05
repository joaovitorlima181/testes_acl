@extends('layout')

@section('cabecalho')
   Adicionar Permissões ao {{$role->name}}
@endsection
@section('conteudo')
<div class="container">
    <h2 class="center">Lista de Permissões para {{$role->name}}</h2>

    <div class="row">
        <form action="{{route('roles.permission.store', $role->id)}}" method="post">
        @csrf
        <div class="input-field">
            <select name="permission_id">
                @foreach($permissions as $permission)
                <option value="{{$permission->id}}">{{$permission->name}}</option>
                @endforeach
            </select>
        </div>
            <button class="btn btn-primary">Adicionar</button>
        </form>
    </div>

    <div class="row">
        <table>
            <thead>
                <tr>

                    <th>Permissão</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($role->permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->description }}</td>

                    <td>

                        <form action="{{route('roles.permission.destroy',[$role->id, $permission->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button title="Deletar" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
