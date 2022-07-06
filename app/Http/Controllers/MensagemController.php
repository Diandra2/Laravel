<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use Illuminate\Http\Request;
use App\Models\Topico;
use Illuminate\Support\Facades\Auth;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensagem = Mensagem::all();
        return view("restrict/mensagem", compact('mensagem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topicos = Topico::all();
        return view("restrict/mensagem/create", compact('topicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'mensagem' => 'required|max:255',
            'topico' => 'array|exsts:App\Models\Topico,id'
        ]);
        if ($validated) {
            $mensagem = new Mensagem();
            $mensagem->user_id = Auth::user()->id;
            $mensagem->titul = $request->get('titulo');
            $mensagem->titul = $request->get('mensagem');
            $mensagem->save();
            $mensagem->topicos()->attach($request->get('topicos'));
            return redirect('mensagem');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show(Mensagem $mensagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensagem $mensagem)
    {
        $topicos = Topico::all();
        return view("restict/mensagem/edit", compact('topicos', 'mensagem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensagem $mensagem)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'mensagem' => 'required|max:255',
            'topico' => 'array|exsts:App\Models\Topico,id'
        ]);
        if ($validated) {
            $mensagem = new Mensagem();
            $mensagem->user_id = Auth::user()->id;
            $mensagem->titul = $request->get('titulo');
            $mensagem->titul = $request->get('mensagem');
            $mensagem->save();
            $mensagem->topicos()->attach($request->get('topicos'));
            return redirect('mensagem');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensagem $mensagem)
    {
        $mensagem->delete();
        return redirect("mensagem");
    }
}
