<?php

namespace App\Http\Controllers;

use APP\Http\Controllers\Controlles;
use App\Models\Topico;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TopicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topicos = Topico::all();
        return $this->success($topicos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("restrict/topico/create");
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
            'topico' => 'required|max:255',
        ]);
        if ($validated) {
            try {
                $topico = new Topico();
            $topico->topico = $request->get('topico');
            $topico->save();
            return $this->success($topico);
        } catch (\Throwable $t) {
            return $this->error("Error ao cadastrar o tópico!!!", 401, $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topico  $topico
     * @return \Illuminate\Http\Response
     */
    public function show(Topico $topico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topico  $topico
     * @return \Illuminate\Http\Response
     */
    public function edit(Topico $topico)
    {
        return view("restrict/topico/edit", compact('topico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topico  $topico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topico $topico)
    {
        
        $validated = $request->validate([
            'topico' => 'required|max:255',
        ]);
        if ($validated) {
            $topico = new Topico();
            $topico->topico = $request->get('topico');
            $topico->save();
            return redirect('topico');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topico  $topico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topico $topico)
    {
        $topico->delete();
        return redirect("topico");
    }
}
