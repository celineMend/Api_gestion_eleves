<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Response;
use App\Http\Requests\StoreEleveRequest;
use App\Http\Requests\UpdateEleveRequest;

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
        $eleve = new Eleve();
        $eleve->fill($request->validated());
        $eleve->save();
        return self::customJsonResponse("Élève créé avec succès", $eleve, 201);
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
    public function update(UpdateEleveRequest $request, $id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->update($request->validated());
        return self::customJsonResponse('Élève mis à jour avec succès', $eleve, 200);
    }

    /**
     * Supprimer une ressource spécifique.
     */
    public function destroy($id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->delete();
        return self::customJsonResponse('Élève supprimé avec succès', null, 200);
    }

    /**
     * Restaurer une ressource supprimée.
     */
    public function restore($id)
    {
        $eleve = Eleve::onlyTrashed()->where('id', $id)->first();
        if ($eleve) {
            $eleve->restore();
            return self::customJsonResponse('Élève restauré avec succès', $eleve, 200);
        } else {
            return response()->json([
                'message' => 'Élève non trouvé ou déjà restauré',
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
            return self::customJsonResponse('Élève supprimé définitivement', null, 200);
        } else {
            return response()->json([
                'message' => 'Élève non trouvé ou déjà supprimé définitivement',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Afficher les ressources supprimées.
     */
    public function trashed()
    {
        $eleves = Eleve::onlyTrashed()->get();
        return self::customJsonResponse('Élèves archivés', $eleves, 200);
    }
}
