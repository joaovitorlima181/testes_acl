@extends('layout')

@section('cabecalho')
    Papéis para {{$user->name}}
@endsection

@section('conteudo')
<div class="container">
    <div class="row">
        <form action="{{route('users.role.store', $user->id)}}" method="post">
        @csrf
        <div class="input-field">
            <select name="role_id">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
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

                    <th>Papel</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user->roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>

                    <td>
                        <form action="{{route('users.role.destroy',[$user->id, $role->id])}}" method="post">
                               @method('DELETE')
                               @csrf
                                <button title="Deletar" class="btn btn-danger">Remover</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

