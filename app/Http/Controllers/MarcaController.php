<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller {

    public function __construct(Marca $marca) {
        $this->marca = $marca;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $marcas = $this->marca->all();
        return $marcas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $marca = $this->marca->create($request->all());
        return $marca;
    }

    /**
     * Display the specified resource.
     *
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $marca = $this->marca->find($id);
        return $marca;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Marca $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca) {
        /*
        print_r($request->all()); //os dados atualizados
        echo '<hr>';
        print_r($marca->getAttributes()); //os dados antigos
        */
        $marca->update($request->all());
        return $marca;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Marca $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca) {
        $marca->delete();
        return ['msg' => 'A marca foi removida com sucesso!'];
    }
}
