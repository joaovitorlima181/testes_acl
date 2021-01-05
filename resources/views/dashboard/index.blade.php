@extends('layout')

@section('cabecalho')
    Dashboard
@endsection

@section('conteudo')

<div class="container overflow-hidden">
    <div class="row gy-5">

      
      @can('chamados-view')
        <div class="col-6">
          <div class="p-3 border bg-primary bg-gradient"><a href="{{route('chamados.index')}}" class="text-decoration-none text-dark">Chamados</a> </div>
        </div>
      @endcan

      @can('perfil-view')
        <div class="col-6">
          <div class="p-3 border bg-secondary bg-gradient"><a href="" class="text-decoration-none text-dark">Profile</a> </div>
        </div>
      @endcan
     

      @can('role-view')
        <div class="col-6">
          <div class="p-3 border bg-success bg-gradient"><a href="{{route('roles.index')}}" class="text-decoration-none text-dark">Papéis</a> </div>
        </div>
      @endcan
      

      @can('usuario-view')
        <div class="col-6">
          <div class="p-3 border bg-warning bg-gradient"><a href="{{route('users.index')}}" class="text-decoration-none text-dark">Usuários</a> </div>
        </div>
      @endcan

    </div>
</div>

@endsection
