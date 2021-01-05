@extends('layout')

@section('cabecalho')
    Usuários
@endsection
@section('conteudo')
<div class="container">
    <h2 class="center">Lista de Usuários</h2>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>

                        <form action="{{route('users.destroy', $user->id)}}" method="post">

                            <a title="Editar" class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Editar</a>
                            <a title="Papel" class="btn btn-warning" href="{{route('users.role', $user->id)}}">Papel</a>

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

<a title="Editar" class="btn blue" href="/registrar"><button class="btn btn-primary mt-3">Criar Usuário</button></a>
@endsection