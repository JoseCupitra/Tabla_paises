<?php

namespace App\Http\Controllers;

use App\Models\pais;
use Illuminate\Http\Request;


class PaisController extends Controller
{
    public function index(Request $request)
    {
        $paises = Pais::query();

        // Filtrado por nombre
        if ($request->has('nombre')) {
            $paises->where('Nombre', 'like', '%' . $request->input('nombre') . '%');
        }

        $paises = $paises->paginate(5); // Paginación, 10 registros por página

        return view('pais.index', compact('paises'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $paises=new Pais;
        $paises->Nombre=$request->input('Nombre');
        $paises->Capital=$request->input('Capital');
        $paises->Idioma_oficial=$request->input('Idioma_oficial');
        $paises->save();
        return redirect()->back();
        //
    }

    public function show(pais $pais)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request,$id)
    {
        $paises=cliente::find($id);
        $paises->Nombre=$request->input('Nombre');
        $paises->Capital=$request->input('Capital');
        $paises->Idioma_Oficial=$request->input('Idioma_Oficial');
        $paises->update();
        return redirect()->back();
        //
    }

    public function destroy($id)
    {
        $paises=pais::find($id);
        $paises->delete();
        return redirect()->back();
        //
    }
}
