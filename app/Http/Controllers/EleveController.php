<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEleveRequest;
use App\Http\Requests\UpdateEleveRequest;
use App\Models\Eleve;
use Illuminate\Http\Response;

class EleveController extends Controller
{
    /**
     * Afficher une liste des ressources.
     */
    public function index()
    {
        $eleves = Eleve::all();
        return response()->json($eleves);
    }

    /**
     * Stocker une nouvelle ressource.
     */
    public function store(StoreEleveRequest $request)
    {
        $eleve = Eleve::create($request->validated());
        return response()->json($eleve, Response::HTTP_CREATED);
    }

    /**
     * Afficher une ressource spécifique.
     */
    public function show(Eleve $eleve)
    {
        return response()->json($eleve);
    }

    /**
     * Mettre à jour une ressource spécifique.
     */
    public function update(UpdateEleveRequest $request, Eleve $eleve)
    {
        $eleve->update($request->validated());
        return response()->json($eleve);
    }

    /**
     * Supprimer une ressource spécifique.
     */
    public function destroy(Eleve $eleve)
    {
        $eleve->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Restaurer une ressource supprimée.
     */
    public function restore($id)
    {
        $eleve = Eleve::onlyTrashed()->where('id', $id)->first();
        if ($eleve) {
            $eleve->restore();
            return response()->json([
                'message' => 'Eleve restauré avec succès',
                'eleve' => $eleve,
            ]);
        } else {
            return response()->json([
                'message' => 'Eleve non trouvé ou déjà restauré',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Supprimer définitivement une ressource.
     */
    public function forceDelete($id)
    {
        $eleve = Eleve::onlyTrashed()->where('id', $id)->first();
        if ($eleve) {
            $eleve->forceDelete();
            return response()->json([
                'message' => 'Eleve supprimé définitivement',
            ]);
        } else {
            return response()->json([
                'message' => 'Eleve non trouvé ou déjà supprimé définitivement',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Afficher les ressources supprimées.
     */
    public function trashed()
    {
        $eleves = Eleve::onlyTrashed()->get();
        return response()->json([
            'message' => 'Eleves archivés',
            'eleves' => $eleves,
        ]);
    }
}
