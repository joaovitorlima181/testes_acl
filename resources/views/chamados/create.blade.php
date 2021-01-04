@extends('layout')

@section('cabecalho')
    Novo Chamado
@endsection

@section('conteudo')

<form method="post">
    @csrf
    <div class="row">
        <div class="col col-7">
            <label for="chamadoTitle">Título:</label>
            <input type="text" class="form-control" name="chamadoTitle" id="chamadoTitle" required>
        </div>

        <div class="col col-2">
            <label for="chamadoDescription">Descrição:</label>
            <input type="textarea" class="form-control"name="chamadoDescription" id="chamadoDescription" required>
        </div>
    </div>

    <div> <button class="btn btn-primary mt-2">Adicionar</button> </div>
   
</form>
@endsection