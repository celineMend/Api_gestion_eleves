<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Evaluation;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;

class EvaluationController extends Controller
{
    /**
     * Afficher une liste des ressources.
     */
    public function index()
    {
        // Récupérer tous les élèves avec leurs évaluations et les matières
        $eleves = Eleve::with('evaluations.matiere')->get();

        // Retourner les données en format JSON
        return response()->json($eleves);
    }

    /**
     * Stocker une nouvelle ressource.
     */
    public function store(StoreEvaluationRequest $request, $eleveId)
    {
        // Récupérer l'élève par son ID
        $eleve = Eleve::findOrFail($eleveId);

        // Créer une nouvelle évaluation avec les données validées et l'associer à l'élève
        $evaluation = new Evaluation($request->validated());
        $evaluation->eleve_id = $eleve->id;
        $evaluation->save();

        // Retourner une réponse JSON avec succès
        return response()->json([
            'message' => 'Évaluation ajoutée avec succès',
            'evaluation' => $evaluation
        ], 201);
    }

    /**
     * Afficher une ressource spécifique.
     */
    public function show(Evaluation $evaluation)
    {
        // Récupérer l'élève avec ses évaluations et les matières
        $eleve = Eleve::with('evaluations.matiere')->findOrFail($evaluation->eleve_id);

        // Retourner les données en format JSON
        return response()->json($eleve);
    }

    /**
     * Mettre à jour une ressource spécifique.
     */
    public function update(UpdateEvaluationRequest $request, $id)
    {
        // Récupérer l'évaluation par son ID
        $evaluation = Evaluation::findOrFail($id);

        // Mettre à jour l'évaluation avec les données validées
        $evaluation->update($request->validated());

        // Retourner une réponse JSON avec succès
        return response()->json([
            'message' => 'Évaluation mise à jour avec succès',
            'evaluation' => $evaluation
        ], 200);
    }

    /**
     * Supprimer une ressource spécifique.
     */
    public function destroy(Evaluation $evaluation)
    {
        // Supprimer l'évaluation
        $evaluation->delete();
        return response()->json(['message' => 'Évaluation supprimée avec succès']);
    }
}
