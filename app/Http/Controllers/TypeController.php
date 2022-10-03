<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoEditRequest;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    function __construct() {
        //$this-> middleware('logged', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
        $this-> middleware('logged', ['except' => ['']]);        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = tipo::all()->sortBy('tipo');
        return view('tipo.index', ['activeTipo' => 'active',
                                        'tipos' => $tipos,
                                        'subTitle' => 'Type list',
                                        'title' => 'Type',]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo.create', ['activetipo' => 'active',
                                        'subTitle' => 'Add Type',
                                        'title' => 'Type',]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tipo' => 'required|min:2|max:100',
            'descripcion' => '',
        ];
        $messages = [
            'tipo.max'      => 'name is too long',
            'tipo.min'      => 'name is too short',
            'tipo.required' => 'name is required',
            'descripcion.required' => 'price is required',
        ];
        $validator = Validator::make($request->all() ,$rules, $messages);
        if ($validator->fails()) {
            return back()
                    ->withInput()
                    ->withErrors($validator);
        }
        $Type = new tipo($request->all());
        try {
            $Type->save();
            $message = 'The Type has been inserted with id number: ' . $Type->id;
        } catch(\Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['store' => 'An unexpected error occurred while inserting.']);
        }
        return redirect('tipo')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(tipo $tipo)
    {
        return view('tipo.show', ['activetipo' => 'active',
                                        'tipo' => $tipo,
                                        'subTitle' => 'Show Type',
                                        'title' => 'Type',]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(tipo $tipo)
    {
        return view('tipo.edit', ['activetipo' => 'active',
                                        'tipo' => $tipo,
                                        'subTitle' => 'Edit Type',
                                        'title' => 'Type',]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(TipoEditRequest $request, tipo $tipo)
    {
        try {
            $tipo->update($request->all());
            //$tipo->fill($request->all());
            //$tipo->save();
            $message = 'The Type has been updated.';
        } catch(Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
        }
        return redirect('tipo')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        try {
            $tipo->delete();
            $message = 'The Type ' . $tipo->tipo . ' has been removed.';
        } catch(\Exception $e) {
            $message = 'The Type ' . $tipo->tipo . ' has not been removed.';
        }
        return redirect('tipo')->with('message', $message);
    }
}
