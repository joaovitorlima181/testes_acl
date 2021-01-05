<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('chamados-view')){
            abort(403, 'Não Autorizado');
        }

        $chamados = Chamado::all();
        return view('chamados.index', compact('chamados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('chamados-create')){
            abort(403, 'Não Autorizado');
        }

        return view('chamados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('chamados-create')){
            abort(403, 'Não Autorizado');
        }

        $userId = Auth::id();

        DB::beginTransaction();
            
            Chamado::create([
                'user_id' => $userId,
                'title' => $request->chamadoTitle,
                'description' => $request->chamadoDescription
            ]);
        
        DB::commit();

        return redirect()->route('chamados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        if(Gate::denies('chamados-view')){
            abort(403,"Não autorizado!");
        }

        $chamado = Chamado::find($chamado->id);

        return view('chamados.show', compact('chamado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chamado $chamado)
    {
        if(Gate::denies('chamados-edit')){
            abort(403,"Não autorizado!");
        }

        $chamado = Chamado::find($chamado->id);
        $chamado->description = $request->descriptionChamado;
        $chamado->title = $request->titleChamado;
        $chamado->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('chamados-delete')){
            abort(403,"Não autorizado!");
        }

        Chamado::find($id)->delete();
        return redirect()->route('chamados.index');
    }
}
