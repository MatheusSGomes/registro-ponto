<?php

namespace App\Http\Controllers;

use App\Models\Feriado;
use Illuminate\Http\Request;

class FeriadoController extends Controller
{
    public function index()
    {
        return Feriado::all();
    }

    public function store(Request $request)
    {
        return Feriado::create($request->all());
    }

    public function show(string $id)
    {
        return Feriado::find($id);
    }

    public function update(Request $request, string $id)
    {
        return Feriado::find($id)->update($request->all());
    }

    public function destroy(string $id)
    {
        return Feriado::find($id)?->delete();
    }
}
