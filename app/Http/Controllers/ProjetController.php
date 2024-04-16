<?php

namespace App\Http\Controllers;

use App\Models\Localite;
use App\Models\Projet;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::all();

        return view('projets.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $localites = Localite::all();
        return view('projets.create', compact('localites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'codeProjet' => 'required|string|unique:projets,codeProjet',
            'nomProjet' => 'string',
            'dateLancement' => 'date',
            'duree' => 'integer',
            'codLocalite' => 'integer'
        ]);

        Projet::create($validate);
        return redirect()->route('projets.index')->with('success', 'Projet crée avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $codeProjet)
    {
        $projet = Projet::find($codeProjet);
        $localites = Localite::all();
        return view('projets.edit', compact('projet', 'localites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $codeProjet)
    {
        $projet = Projet::find($codeProjet);

        $validate = $request->validate([
            'codeProjet' => 'required|string|unique:projets,codeProjet',
            'nomProjet' => 'string',
            'dateLancement' => 'date',
            'duree' => 'integer',
            'localite' => 'integer'
        ]);

        $projet->update($validate);

        return redirect()->route('projets.index')->with('success', 'Projet updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {

        $projet->delete();

        return redirect()->route('projets.index')->with('success', 'Projet deleted successfully');
    }
}
