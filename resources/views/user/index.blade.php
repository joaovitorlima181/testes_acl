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

                        <a title="Editar" class="btn blue" href="{{route('user.edit', $user->id)}}"><button class="btn btn-dark mt-3">Editar</button></a>

                        <form action="{{route('user.destroy', $user->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <a title="Deletar" class="btn blue"><button class="btn btn-danger mt-3">Delete</button></a>
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