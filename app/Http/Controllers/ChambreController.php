<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    public function index()
    {
        $chambres = Chambre::paginate(9);
        return view('index', compact('chambres'));
    }

    public function show(Chambre $chambre)
    {
        return view('show', compact('chambre'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:chambres|max:4',
            'floor' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'nullable|numeric',
        ]);

        Chambre::create($request->all());
        return redirect()->route('chambres.index')->with('success', 'Room created successfully.');
    }

    public function edit(Chambre $chambre)
    {
        $categories = Categorie::all();
        return view('edit', compact('chambre', 'categories'));
    }

    public function update(Request $request, Chambre $chambre)
    {
        $request->validate([
            'number' => 'required|unique:chambres,number,' . $chambre->id . '|max:4',
            'floor' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'nullable|numeric',
        ]);

        $chambre->update($request->all());
        return redirect()->route('chambres.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Chambre $chambre)
    {
        $chambre->delete();
        return redirect()->route('chambres.index')->with('success', 'Room deleted successfully.');
    }
}
