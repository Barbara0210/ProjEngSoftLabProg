<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Photo;
use Illuminate\Support\Facades\Storage;



class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $anuncios= Anuncio::paginate(5);
       return view('anuncios.index',compact('anuncios'));
        //
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'anuncios.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // $request->validate([
         //   'titulo' -> (nao e esta seta) 'required|min:2',
//]);


        $anuncio= new Anuncio;
        $anuncio->titulo = $request->titulo;
        $anuncio->preco = $request->preco;
        $anuncio->estado = $request->estado;
        $anuncio->descricao = $request->descricao;
        $anuncio->user_id= $request->user()->id;
        
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',]); //validacao se e uma imagem

        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images');
    
       
        $anuncio->path = $request->file('image')->hashName();
        $anuncio->save();

        //Anuncio::create($request->all());
        return redirect('/anuncios');



        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        return view('anuncios.show',['anuncio' => $anuncio]);
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncio $anuncio)
    {
        return view('anuncios.edit',['anuncio' => $anuncio]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anuncio $anuncio)
    {
        $anuncio->update($request->all());
        return redirect('/anuncios');

      //  $request->validate([
          //  'titulo' => 'required',
            //'preco' => 'required',
            //'estado' => 'required',
          //  'descricao' => 'required',

     //   ]);

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        //
        $anuncio->delete();
        return redirect('/anuncios');
    }
}
