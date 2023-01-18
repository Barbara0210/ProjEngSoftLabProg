<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

    class ComentarioController extends Controller
    {


        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $comentarios = Comentario::paginate(10);
            return view('comentarios.index',compact('comentarios'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view( 'comentarios.create');

        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $comentario= new Comentario;
            $comentario->descricao = $request->descricao;
            $comentario->user_id = $request->user()->id;
            $comentario->save();

            return redirect('/comentarios');
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\comentarios  $comentarios
         * @return \Illuminate\Http\Response
         */
        public function show(Comentario $comentario)
        {
            return view('comentarios.show',['comentario' => $comentario]);

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\comentarios  $comentarios
         * @return \Illuminate\Http\Response
         */
        public function edit(Comentario $comentario)
        {
            return view('comentarios.edit',['comentario' => $comentario]);

        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\comentarios  $comentarios
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Comentario $comentario)
        {
            $comentario->update($request->all());
            return redirect('/comentarios');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\comentarios  $comentarios
         * @return \Illuminate\Http\Response
         */
        public function destroy(Comentario $comentario)
        {
            $comentario->delete();
            return redirect('/comentarios');

        }
    }
